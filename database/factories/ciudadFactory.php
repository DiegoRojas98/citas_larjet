<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\ciudad;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ciudad>
 */
class ciudadFactory extends Factory
{
    protected $model = ciudad::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'descripcion' => $this->faker->unique()->city(),
            'pais_id' => rand(1,3)
        ];
    }
}
