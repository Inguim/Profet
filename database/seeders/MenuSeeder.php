<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'nome' => 'Início'
        ]);
        Menu::create([
            'nome' => 'Categorias'
        ]);
        Menu::create([
            'nome' => 'Ajuda'
        ]);
    }
}
