<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Profet',
            'email' => 'profet@gmail.com',
            'tipo' => 'aluno',
            'admin' => true,
            'status' => 'aprovado',
            'password' => Hash::make('profeT@9102')
        ]);

        Aluno::create([
            'user_id' => $user->id,
            'serie_id' => 3,
            'curso_id' => 1
        ]);
    }
}
