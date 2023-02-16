<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\client>
 */
class ClientFactory extends Factory
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
            "Apellidos" => $this->faker->lastName(),
            "Direccion"=>$this->faker->address(),
            "email"=>$this->faker->email(),
            "center_id"=>$this->faker->numberBetween(1,10)
        
        ];
    }
}
