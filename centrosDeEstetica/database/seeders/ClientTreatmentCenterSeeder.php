<?php

namespace Database\Seeders;

use App\Models\Center;
use App\Models\Client;
use App\Models\Treatment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientTreatmentCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

         Client::factory()->count(10)->create();
         Treatment::factory()->count(10)->create();
         Center::factory()->count(10)->create();
    }
}
