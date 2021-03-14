<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\UsuarioProj;
use Exception;
use Illuminate\Http\Request;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projetos = Projeto::with(['estado'])
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('', compact('projetos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projeto.novoprojeto');
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
            $request->validate([
                'nome' => 'required|max:100',
                'resumo' => 'required',
                'introducao' => 'required',
                'objetivo' => 'required',
                'metodologia' => 'required',
                'result_disc' => 'required',
                'conclusao' => 'required',
                'categoria_id' => 'required|numeric',
                'estado_id' => 'required|numeric',
            ]);

            $projeto = new Projeto([
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


        } catch (Exception $e) {
            return view('')->with('Error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $projeto = Projeto::where('nome', '=', $request->get('nome'))
            ->with(['users'])
            ->with(['estado'])
            ->with(['categoria'])
            ->get();

        return view('', compact('projeto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:100',
            'resumo' => 'required',
            'introducao' => 'required',
            'objetivo' => 'required',
            'metodologia' => 'required',
            'result_disc' => 'required',
            'conclusao' => 'required',
            'categoria_id' => 'required|numeric',
            'estado_id' => 'required|numeric',
        ]);

        try {
            $projeto = Projeto::findOrFail($id);

            $projeto->nome = $request->get('nome');
            $projeto->resumo =  $request->get('resumo');
            $projeto->introducao = $request->get('introducao');
            $projeto->objetivo = $request->get('objetivo');
            $projeto->metodologia = $request->get('metodologia');
            $projeto->result_disc = $request->get('result_disc');
            $projeto->conclusao = $request->get('conclusao');
            $projeto->categoria_id = $request->get('categoria_id');
            $projeto->estado_id = $request->get('estado_id');

            $projeto->save();

            return view('');
        } catch (Exception $e) {
            return view('')->with('Error');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projeto = Projeto::findOrFail($id);
        $projeto->delete();

        return redirect('');
    }
}
