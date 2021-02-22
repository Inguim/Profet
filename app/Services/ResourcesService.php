<?php

namespace App\Services;

use App\Models\Categoria;
use App\Models\Curso;
use App\Models\Menu;
use App\Models\Serie;

class ResourcesService
{
    public function menus()
    {
        return Menu::with(['categorias'])->get();
    }

    public function categorias()
    {
        return Categoria::all();
    }

    public function series()
    {
        return Serie::all();
    }

    public function cursos()
    {
        return Curso::all();
    }
}
