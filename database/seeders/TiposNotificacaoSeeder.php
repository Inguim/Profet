<?php

namespace Database\Seeders;

use App\Models\TiposNotificacao;
use Illuminate\Database\Seeder;

class TiposNotificacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TiposNotificacao::create(['nome' => 'solicitacao']);
    }
}
