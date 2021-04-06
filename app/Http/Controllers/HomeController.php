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
        $projetos = Projeto::latest()->take(5)->get();

        // dd($projetos[0]);

        return view('home', compact('projetos'));
    }
}
