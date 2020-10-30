<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curso::create([
            'curso' => 'Informática'
        ]);

        Curso::create([
            'curso' => 'Edificações'
        ]);

        Curso::create([
            'curso' => 'Mecatrônica'
        ]);
    }
}
