<?php

namespace Database\Seeders;

use App\Models\Treatment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        
        DB::table('treatments')->insert([
            'Nombre' => "Manicura",
            'Descripcion' => "Manicura basica monocolor",
            'Precio' => "20",
            'Tipo' => 1

        ]);

        DB::table('treatments')->insert([
            'Nombre' => "Manicura Avanzada",
            'Descripcion' => "Manicura avanzada con formas y texturas",
            'Precio' => "40",
            'Tipo' => 1

        ]);

        DB::table('treatments')->insert([
            'Nombre' => "Pedicura",
            'Descripcion' => "Pedicura y exfoliacion de pie",
            'Precio' => "30",
            'Tipo' => 1

        ]);

        DB::table('treatments')->insert([
            'Nombre' => "Masaje corporal completo",
            'Descripcion' => "Masaje relajante de cuerpo completo",
            'Precio' => "120",
            'Tipo' => 1

        ]);

        DB::table('treatments')->insert([
            'Nombre' => "Corte de Pelo",
            'Descripcion' => "Corte de pelo sencillo",
            'Precio' => "15",
            'Tipo' => 0

        ]);

        DB::table('treatments')->insert([
            'Nombre' => "Corte de pelo y vello facial",
            'Descripcion' => "Corte de pelo y diseño de cejas y/o afeitado de barba",
            'Precio' => "18",
            'Tipo' => 0

        ]);

        DB::table('treatments')->insert([
            'Nombre' => "Teñido de pelo",
            'Descripcion' => "Tratamiento para teñir el pelo",
            'Precio' => "50",
            'Tipo' => 0

        ]);

        DB::table('treatments')->insert([
            'Nombre' => "Permanente",
            'Descripcion' => "Ondulacion o rizado de cabello",
            'Precio' => "45",
            'Tipo' => 0

        ]);
    

    }
}
