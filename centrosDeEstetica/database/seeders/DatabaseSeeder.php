<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Center;
use App\Models\Client;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        $this->call([   
            // // ProductSeeder::class,
            // ClientSeeder::class,
            
            CenterSeeder::class,
            AestheticSeeder::class,
            HairsalonSeeder::class,
            TreatmentSeeder::class,
            ClientSeeder::class
        //   ClientTreatmentCenterSeeder::class,

        ]);
    }
}
