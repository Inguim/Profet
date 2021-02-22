<?php

namespace App\Services;

use App\Models\Menu;

class ResourcesService
{
  public function menus()
  {
    return Menu::with(['categorias'])->get();
  }
}
