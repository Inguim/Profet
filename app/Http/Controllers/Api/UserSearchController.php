<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserSearchController extends Controller
{
    public function show($search, $tipo)
    {
        $user = User::where('tipo', '=', $tipo)
            ->where('status', 'aprovado')
            ->where('name', 'LIKE', "%{$search}%")
            ->get(['id', 'name']);

        return new DataResource($user);
    }
}
