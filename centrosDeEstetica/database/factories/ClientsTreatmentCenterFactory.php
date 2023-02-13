<?php

namespace Database\Factories;

use App\Models\Center;
use App\Models\Client;
use App\Models\Treatment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ClientsTreatmentCenterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          
            // "client_id"=> Client::inRandomOrder()->first()->id,
            // "center_id"=> Center::inRandomOrder()->first()->id,
            // "treatment_id"=> Treatment::inRandomOrder()->first()->id,
            
            
        ];
    }
}
