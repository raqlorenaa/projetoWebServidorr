<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Eventos; 
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Criar 10 usuários
        User::factory(10)->create();

        // Criar um usuário específico
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Criar 20 eventos vinculados aos usuários criados
        Eventos::factory(20)->create();
    }
}

