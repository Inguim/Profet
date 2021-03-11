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
            'nome' => 'Início',
            'url' => '/'
        ]);
        Menu::create([
            'nome' => 'Categorias',
            'url' => ''
        ]);
        Menu::create([
            'nome' => 'Ajuda',
            'url' => 'ajuda'
        ]);
    }
}
