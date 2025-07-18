<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pontos;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'RH',
            'email' => 'rh@smartfer.com',
            'password' => bcrypt('12345678'),
            'tipo' => 'rh',
        ]);

        User::factory()->count(10)->create([
            'tipo' => 'funcionario',
        ]);

        $this->call([
            PontoSeeder::class,
            AtestadoSeeder::class,
            PerfilSeeder::class,
        ]);
    }
}
