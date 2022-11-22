<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\tipo_identificacion;

class tipo_identificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoIdentidad1 = new tipo_identificacion();
        $tipoIdentidad1->descripcion = "Cedula";
        $tipoIdentidad1->save();

        $tipoIdentidad2 = new tipo_identificacion();
        $tipoIdentidad2->descripcion = "T.I";
        $tipoIdentidad2->save();
        
        $tipoIdentidad3 = new tipo_identificacion();
        $tipoIdentidad3->descripcion = "Pasaporte";
        $tipoIdentidad3->save();
    }
}
