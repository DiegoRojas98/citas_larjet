<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\pais;

class paisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pais1 = new pais();
        $pais1->descripcion = "Colombia";
        $pais1->save();

        $pais2 = new pais();
        $pais2->descripcion = "Chile";
        $pais2->save();

        $pais3 = new pais();
        $pais3->descripcion = "Peru";
        $pais3->save();
    }
}
