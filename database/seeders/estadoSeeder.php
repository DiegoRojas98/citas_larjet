<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\estado;

class estadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estado1 = new estado();
        $estado1->descripcion = "Nuevo";
        $estado1->save();

        $estado2 = new estado();
        $estado2->descripcion = "Pendiente";
        $estado2->save();

        $estado3 = new estado();
        $estado3->descripcion = "Finalizado";
        $estado3->save();

        $estado4 = new estado();
        $estado4->descripcion = "Activo";
        $estado4->save();

        $estado5 = new estado();
        $estado5->descripcion = "Inactivo";
        $estado5->save();
    }
}
