<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialities')->insert([
            ['name' =>'ALERGOLOGIA'],
            ['name' =>'ANGIOLOGIA'],
            ['name' =>'BUCO MAXILO'],
            ['name' =>'CARDIOLOGIA CLÍNICA'],
            ['name' =>'CARDIOLOGIA INFANTIL'],
            ['name' =>'CIRURGIA CABEÇA E PESCOÇO'],
            ['name' =>'CIRURGIA CARDÍACA'],
            ['name' =>'CIRURGIA DE CABEÇA/PESCOÇO'],
            ['name' =>'CIRURGIA DE TÓRAX'],
            ['name' =>'CIRURGIA GERAL'],
            ['name' =>'CIRURGIA PEDIÁTRICA'],
            ['name' =>'CIRURGIA PLÁSTICA'],
            ['name' =>'CIRURGIA TORÁCICA'],
            ['name' =>'CIRURGIA VASCULAR'],
            ['name' =>'CLÍNICA MÉDICA'],
        ]);
    }
}
