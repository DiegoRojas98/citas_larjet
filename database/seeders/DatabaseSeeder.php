<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\especialidad;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(tipo_identificacionSeeder::class);
        $this->call(rolSeeder::class);
        $this->call(estadoSeeder::class);
        $this->call(especialidadSeeder::class);
        $this->call(ciudadSeeder::class);
        $this->call(paisSeeder::class);
        $this->call(usuariosSeeder::class);
    }
}
