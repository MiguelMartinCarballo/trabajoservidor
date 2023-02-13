<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\treatment>
 */
class TreatmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            "Nombre" => $this->faker->firstName(),
            "Descripcion" => $this->faker->word(),
            "Precio" => $this->faker->randomFloat(2,2,40)
        
            
        ];
    }
}
