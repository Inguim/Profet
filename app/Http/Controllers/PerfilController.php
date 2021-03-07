<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function show($id) {
        if(Auth::id() == $id) {
            $user = User::findOrFail($id);

            return view('perfil', compact('user'));
        } else {
            abort(403);
        }
    }
}
