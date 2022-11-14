<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pacient>
 */
class PacientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name,
            'birth_date' => fake()->dateTimeBetween($startDate = '-100 years', $endDate = 'now', $timezone = null),
            'cpf' => fake()->ipv4,
            'email' => fake()->email,
            'cep' => fake()->postcode,
            'adress' => fake()->address,
            'adress_number' => fake()->buildingNumber ,

        ];
    }
}
