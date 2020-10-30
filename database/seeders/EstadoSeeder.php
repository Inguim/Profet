<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create([
            'estado' => 'Concluído'
        ]);

        Estado::create([
            'estado' => 'Em andamento'
        ]);

        Estado::create([
            'estado' => 'A procura de participante'
        ]);
    }
}
