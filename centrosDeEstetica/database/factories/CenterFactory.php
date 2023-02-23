<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Center>
 */
class CenterFactory extends Factory
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
            "Direccion"=>$this->faker->address(),
            "CIF"=>$this->faker->dni(),
            "Razon social" => $this->faker->word()
        ];
    }
}
