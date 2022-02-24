<?php

namespace Database\Seeders;

use App\Models\Contribuidor;
use App\Models\TipoContribuicao;
use Illuminate\Database\Seeder;

class TipoContribuicaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoContribuicao::create([
          'nome' => 'Idealizador e desenvolvedor'
        ]);

        TipoContribuicao::create([
          'nome' => 'Desenvolvedor'
        ]);
        TipoContribuicao::create([
          'nome' => 'Apoio e manutenção'
        ]);
        Contribuidor::create([
          'github_username' => 'Inguim',
          'tipo_contribuicao_id' => 1,
          'user_id' => 5
        ]);
        Contribuidor::create([
          'github_username' => 'gmantovanibrito',
          'tipo_contribuição_id' => 1,
          'user_id' => 3
        ]);
        Contribuidor::create([
          'github_username' => 'lazarodu',
          'tipo_contribuição_id' => 1,
          'user_id' => 2
        ]);
    }
}
