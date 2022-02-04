<?php

namespace App\Http\Traits;

use Carbon\Carbon;

trait formatDate
{
  public function daysAgo($date)
  {
    $aux = explode('-', substr($date, 0, 10));
    $aux = Carbon::createMidnightDate($aux[0], $aux[1], $aux[2]);
    $now = Carbon::now();

    $days = $now->diffInDays($aux);

    if ($days === 0) {
      $text = "Hoje";
    } else if ($days === 1) {
      $text = "Há {$days} dia";
    } else if ($days >= 100) {
      $text = "Há muito tempo atrás";
    } else {
      $text = "Há {$days} dias";
    }
    return $text;
  }
}
