<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function show($id) {
        if(Auth::id() == $id) {
            return view('perfil');
        } else {
            abort(403);
        }
    }
}
