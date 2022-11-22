<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\usuarios;

class usuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new usuarios();
        $admin->nombre = "Diego Rojas";
        $admin->identidad = "101368";
        $admin->password = "101368";
        $admin->passwordHelper = "101368";
        $admin->rol_id = "1";
        $admin->estado_id = "4";
        $admin->tipo_identidad_id = "1";
        $admin->ciudad_id = "1";
        $admin->save();

        usuarios::factory(15)->create();
    }
}
