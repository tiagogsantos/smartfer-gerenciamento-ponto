<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Busca todos os usuários existentes
        $users = DB::table('users')->get();

        foreach ($users as $user) {
            DB::table('perfil')->insert([
                'foto_capa'       => null,
                'estado_civil'    => 'solteiro',
                'cpf'             => '000.000.000-' . str_pad($user->id, 2, '0', STR_PAD_LEFT),
                'rg'              => 'MG-' . rand(1000000, 9999999),
                'data_nascimento' => Carbon::now()->subYears(rand(20, 50)),

                // Endereço
                'cep'         => '01001-000',
                'rua'         => 'Rua Exemplo',
                'numero'      => rand(1, 500),
                'complemento' => 'Apto ' . rand(1, 100),
                'bairro'      => 'Centro',
                'cidade'      => 'São Paulo',
                'uf'          => 'SP',

                // Contato
                'telefone' => '(11) 91234-5678',

                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
