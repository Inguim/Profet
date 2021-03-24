<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\Categoria;
use App\Models\Estado;
use App\Models\Projeto;
use App\Models\UsuarioProj;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = [
            'categorias' => Categoria::orderBy('id', 'asc')->get(['id', 'nome'])->all(),
            'estados' => Estado::orderBy('id', 'asc')->get(['id', 'estado'])->all()
        ];

        return new DataResource($dados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $projeto = Projeto::create([
                'nome' => $request->get('nome'),
                'resumo' => $request->get('resumo'),
                'introducao' => $request->get('introducao'),
                'objetivo' => $request->get('objetivo'),
                'metodologia' => $request->get('metodologia'),
                'result_disc' => $request->get('result_disc'),
                'conclusao' => $request->get('conclusao'),
                'categoria_id' => $request->get('categoria_id'),
                'estado_id' => $request->get('estado_id'),
            ]);

            if(isset($projeto)) {
                UsuarioProj::create([
                    'user_id' => auth()->id(),
                    'projeto_id' => $projeto->id,
                    'relacao' => $request->get('atuacao_escritor')
                ]);

                $membros = $request->get('users');
                // dd($membros[0]['user_id']);

                foreach($membros as $membro) {
                    UsuarioProj::create([
                        'user_id' => $membro['user_id'],
                        'projeto_id' => $projeto->id,
                        'relacao' => $membro['relacao']
                    ]);
                }
            }
            DB::commit();

            $erro = [
                'erro' => false,
                'msg' => "Esse nome ja está sendo utilizado, tente outro"
            ];
            return new DataResource($erro);
        } catch (Exception $e) {
            $erro = [
                'erro' => true,
                'msg' => "Esse nome ja está sendo utilizado, tente outro"
            ];
            return new DataResource($erro);
        }
    }
}
