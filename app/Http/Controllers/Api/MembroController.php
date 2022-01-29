<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\Aluno;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class MembroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::join('users', 'users.id', '=', 'alunos.user_id')
            ->join('cursos', 'alunos.curso_id', '=', 'cursos.id')
            ->join('series', 'alunos.serie_id', '=', 'series.id')
            ->where('users.status', 'analise')
            ->select(
                'users.id',
                'users.name',
                'cursos.curso',
                'series.serie'
            )
            ->get();

        $professor = User::where('status', 'analise')
            ->where('tipo', 'professor')
            ->with(['professor.categorias:id,nome'])
            ->get(['id', 'name', 'email']);

        $users = [
            'alunos' => $alunos,
            'professores' => $professor
        ];

        return new DataResource($users);
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

        try {
            $user = User::findOrFail($id);
            $user->status = 'aprovado';
            $user->save();

            $message['message'] = 'Status atualizado com sucesso!';

            return new DataResource($message);
        } catch (Exception $e) {
            $message = [
                'erro' => true,
                'message' => 'Não foi possivel atualizar o status do usuário!'
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
            $user = User::findOrFail($id);
            $user->delete();

            $message['message'] = 'Usuário deletado com sucesso!';

            return new DataResource($message);
        } catch (Exception $e) {
            $message = [
                'erro' => true,
                'message' => 'Não foi possivel deletar usuário!'
            ];

            return new DataResource($message);
        }
    }
}
