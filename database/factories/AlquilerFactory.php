<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\coche;
use App\Models\persona;
class AlquilerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_alquiler'   => $this->faker->unique()->regexify('[0-9]{3}'),
            'Matricula'     => $this->faker->randomElement(coche::pluck('Matricula')),
            'DNI'           => $this->faker->randomElement(persona::pluck('DNI')),
            'fecha_salida'  => $this->faker->dateTimeBetween('-1 years', 'now'),
            'fecha_devuelto'=> $this->faker->dateTimeBetween('now', '+1 years'),
            'precio_dia'    => $this->faker->randomFloat(2, 10, 20),
            'Multa'         => $this->faker->randomFloat(2, 0, 20),
        ];
    }
}
