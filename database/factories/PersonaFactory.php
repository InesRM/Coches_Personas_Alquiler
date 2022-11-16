<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'DNI' => $this->faker->unique()->regexify('[0-9]{8}[A-Z]{1}'),
            'Nombre' => $this->faker->randomElement(User::pluck('name')),
            'Tfno' => $this->faker->numberBetween(10000, 99999),
            'edad' => $this->faker->numberBetween(18, 99),
            'rol' => $this->faker->randomElement(User::pluck('rol')),
        ];

    }
}
