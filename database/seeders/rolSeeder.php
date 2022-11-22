<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\rol;

class rolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol1 = new rol();
        $rol1->descripcion = "Administrador";
        $rol1->save();

        $rol2 = new rol();
        $rol2->descripcion = "Asesor";
        $rol2->save();

        $rol3 = new rol();
        $rol3->descripcion = "Cliente";
        $rol3->save();
    }
}
