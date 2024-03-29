<?php

namespace Database\Seeders;

use App\Models\TipoContribuicao;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            MenuSeeder::class,
            CategoriaSeeder::class,
            EstadoSeeder::class,
            SerieSeeder::class,
            CursoSeeder::class,
            UserSeeder::class,
            TiposNotificacaoSeeder::class,
            TipoContribuicao::class
        ]);
    }
}
