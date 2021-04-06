<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projetos = Projeto::where('status', 'aprovado')->latest()->take(5)->get();

        return view('home', compact('projetos'));
    }
}
