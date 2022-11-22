<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use  App\Models\especialidad;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\especialidad>
 */
class especialidadFactory extends Factory
{
    protected $model = especialidad::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'descripcion' => $this->faker->unique()->word()
        ];
    }
}
