<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'menu_id' => 2,
            'nome' => 'Ciências Agrárias'
        ]);

        Categoria::create([
            'menu_id' => 2,
            'nome' => 'Ciências Biológicas'
        ]);

        Categoria::create([
            'menu_id' => 2,
            'nome' => 'Ciências da Saúde'
        ]);

        Categoria::create([
            'menu_id' => 2,
            'nome' => 'Ciências Exatas e da Terra'
        ]);

        Categoria::create([
            'menu_id' => 2,
            'nome' => 'Ciências Humanas'
        ]);

        Categoria::create([
            'menu_id' => 2,
            'nome' => 'Ciências Sociais Aplicadas'
        ]);

        Categoria::create([
            'menu_id' => 2,
            'nome' => 'Engenharias'
        ]);

        Categoria::create([
            'menu_id' => 2,
            'nome' => 'Linguística, Letras e Artes'
        ]);

        Categoria::create([
            'menu_id' => 2,
            'nome' => 'Multidisciplinar'
        ]);
    }
}
