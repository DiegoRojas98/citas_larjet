<?php

namespace Database\Factories;

use App\Models\usuarios;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\usuarios>
 */
class usuariosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
    */

    protected $model = usuarios::class;

    public function definition()
    {
        if(rand(0,100) > 70){
            $rol = 2;
        }else{
            $rol = 3;
        }
        $identidad = rand(100000,1000000);

        $atributos = [
            'nombre' => $this->faker->unique()->name(),
            'identidad' => $identidad,
            'password' => $identidad,
            'passwordHelper' => $identidad,
            'tipo_identidad_id' => rand(1,3),
            'estado_id' => 4,
            'ciudad_id' => rand(1,12),
            'rol_id' => $rol
        ];

        if($rol == 2){
            $horaInicio = rand(8,17);
            $atributos += [
                'experiencia' => rand(1,30),
                'especialidad' => rand(1,10),
                'horaInicio' => $horaInicio,
                'horaFinal' => rand(++$horaInicio,18)
            ];
        }


        return $atributos;
    }
}
