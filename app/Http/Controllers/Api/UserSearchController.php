<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\User;

class UserSearchController extends Controller
{
    public function show($search)
    {
        $user = User::with(['professor'])->where('name', 'LIKE', "%{$search}%")->where('tipo', 'professor')->get(['id', 'name']);

        return new DataResource($user);
    }
}
