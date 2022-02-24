<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\Contribuidor;

class ContribuidorController extends Controller
{
  public function index()
  {
    $contribuidores = Contribuidor::with(['tipo_contribuicao:id,nome'])->get();

    return new DataResource($contribuidores);
  }
}
