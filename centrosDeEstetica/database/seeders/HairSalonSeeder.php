<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Hairsalon;
use App\Models\Center;

class HairSalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $centersIDs = DB::table('centers')->pluck('id');

        foreach($centersIDs as $id)
        {
            if($id % 2 != 0)
            {

                Hairsalon::factory()->state([
                'center_id' => $id
                ])
                ->create();

            }

        }
    }
}
