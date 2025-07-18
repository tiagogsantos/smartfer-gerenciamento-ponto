<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PontoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            DB::table('pontos')->insert([
                'user_id' => $user->id,
                'data' => Carbon::now()->toDateString(),
                'entrada' => '08:00:00',
                'saida' => '17:00:00',
                'pausa_inicio' => '12:00:00',
                'pausa_fim' => '13:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
