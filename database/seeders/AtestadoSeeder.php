<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AtestadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuariosComuns = User::where('tipo', 'funcionario')->get();
        $usuariosRH = User::where('tipo', 'rh')->pluck('id')->toArray();

        foreach ($usuariosComuns as $user) {
            $dataInicio = Carbon::now()->subDays(rand(1, 15));
            $dataFim = (clone $dataInicio)->addDays(rand(1, 5));

            DB::table('atestados')->insert([
                'user_id' => $user->id,
                'descricao' => 'Atestado médico para repouso.',
                'data_inicio' => $dataInicio->toDateString(),
                'data_fim' => $dataFim->toDateString(),
                'arquivo' => 'atestados/' . $user->id . '_atestado.pdf',
                'status' => 'pendente',
                'justificativa' => null,
                'analisado_por' => count($usuariosRH) > 0 ? $usuariosRH[array_rand($usuariosRH)] : null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
