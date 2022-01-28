<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\Projeto;
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
        $projetos = Projeto::with(['userProjs.user:id,name', "estado:id,estado", "categoria:id,nome"])->where("status", "!=", "aprovado")->latest()->get(["id", "nome", "resumo", "estado_id", "categoria_id"]);

        return new DataResource($projetos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projeto = Projeto::with(['userProjs.user:id,name', "estado:id,estado", "categoria:id,nome"])->findOrFail($id);

        return new DataResource($projeto);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
