<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Speciality>
 */
class SpecialityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $options = [
            'ALERGOLOGIA',
            'ANGIOLOGIA',
            'BUCO MAXILO',
            'CARDIOLOGIA CLÍNICA',
            'CARDIOLOGIA INFANTIL',
            'CIRURGIA CABEÇA E PESCOÇO',
            'CIRURGIA CARDÍACA',
            'CIRURGIA DE CABEÇA/PESCOÇO',
            'CIRURGIA DE TÓRAX',
            'CIRURGIA GERAL',
            'CIRURGIA PEDIÁTRICA',
            'CIRURGIA PLÁSTICA',
            'CIRURGIA TORÁCICA',
            'CIRURGIA VASCULAR',
            'CLÍNICA MÉDICA',
        ];
        return [
            'name' => $this->faker->randomElement($options),
        ];
    }
}
