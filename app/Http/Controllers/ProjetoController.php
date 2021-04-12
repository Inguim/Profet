<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\UsuarioProj;
use Illuminate\Http\Request;

class ProjetoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projeto.novo');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projeto = Projeto::findOrFail($id);

        return view('projeto.visualizar', compact('projeto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projeto = Projeto::findOrFail($id);

        return view('projeto.updateForm', compact('projeto'));
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
            'nome' => "required|max:100",
            'resumo' => "required",
            'introducao' => "required",
            'objetivo' => "required",
            'metodologia' => "required",
            'result_disc' => "required",
            'conclusao' => "required",
        ]);

        $relacao = UsuarioProj::where('user_id', auth()->user()->id)
            ->where('projeto_id', $id)
            ->firstOrFail();

        if(isset($relacao)) {
            $projeto = Projeto::findOrFail($id);
            $projeto->update($request->all());

            $userId = auth()->user()->id;

            return redirect("usuario/{$userId}")->with('success', "Projeto: {$projeto->nome} atualizado!");
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
        $relacao = UsuarioProj::where('user_id', auth()->user()->id)
            ->where('projeto_id', $id)
            ->firstOrFail();

        if(isset($relacao)) {
            $projeto = Projeto::findOrFail($id);
            $projeto->delete();

            $userId = auth()->user()->id;

            return redirect("usuario/{$userId}")->with('success', "Projeto: {$projeto->nome} excluido da plataforma!");
        }
    }
}
