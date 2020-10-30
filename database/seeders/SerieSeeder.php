<?php

namespace Database\Seeders;

use App\Models\Serie;
use Illuminate\Database\Seeder;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Serie::create([
            'serie' => '1'
        ]);

        Serie::create([
            'serie' => '2'
        ]);

        Serie::create([
            'serie' => '3'
        ]);
    }
}
