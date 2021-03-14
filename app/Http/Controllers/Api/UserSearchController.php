<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\User;

class UserSearchController extends Controller
{
    public function show($nome)
    {
        $user = User::join('professors', 'professors.id', '=', 'users.id')
            ->where([
                ['users.tipo', 'professor'],
                ['users.name', 'LIKE', '%'.$nome.'%']
            ])
            ->select([
                'users.name',
                'users.id'
            ])
            ->get();

        return new DataResource($user);
    }
}
