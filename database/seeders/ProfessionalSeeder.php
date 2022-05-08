<?php

namespace Database\Seeders;

use App\Models\Professional;
use App\Models\Speciality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfessionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Professional::factory()
            ->count(5)
            ->create()
            ->each(function($model){
                $specialities = Speciality::inRandomOrder()->limit(3)->get();

                $model->specialities()->attach($specialities);
            });
    }
}
