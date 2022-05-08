<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Professional>
 */
class ProfessionalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new \Faker\Provider\pt_BR\Person($this->faker));
        $this->faker->addProvider(new \Faker\Provider\pt_BR\PhoneNumber($this->faker));

        return [
            'name' => $this->faker->name(),
            'crm' => $this->faker->regexify('[A-Z]{2}[0-9]{8}'),
            'phone' => $this->faker->phone(),
        ];
    }
}
