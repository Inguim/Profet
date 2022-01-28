<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use Illuminate\Http\Request;
use App\Models\Noticia;
use Exception;
use Illuminate\Support\Facades\Auth;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::all();
        return new DataResource($noticias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nome" => "required|max:50",
            "link" => "required|max:255",
        ]);

        $noticia = new Noticia([
            "nome" => $request->get('nome'),
            "link" => $request->get('link'),
            "user_id" => Auth::id(),
        ]);

        $noticia->save();

        return new DataResource($noticia);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $message = [
            'erro' => false,
            'message' => ''
        ];

        $request->validate([
            "nome" => "required|max:50",
            "link" => "required|max:255",
        ]);

        try {
            $noticia = Noticia::findOrFail($id);
            $noticia->nome = $request->get('nome');
            $noticia->link = $request->get('link');
            $noticia->user_id = Auth::id();
            $noticia->save();

            $message['message'] = 'Noticia atualizada com sucesso!';

            return new DataResource($message);
        } catch (Exception $e) {
            $message = [
                'erro' => true,
                'message' => 'Não foi possivel atualizar a notícia!'
            ];

            return new DataResource($message);
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
        $message = [
            'erro' => false,
            'message' => ''
        ];

        try {
            $noticia = Noticia::findOrFail($id);
            $noticia->delete();

            $message['message'] = 'Noticia deletada com sucesso!';

            return new DataResource($message);
        } catch(Exception $e) {
            $message = [
                'erro' => true,
                'message' => 'Não foi possivel deletar a notícia!'
            ];

            return new DataResource($message);
        }
    }
}
