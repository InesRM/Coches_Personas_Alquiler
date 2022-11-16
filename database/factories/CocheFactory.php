<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CocheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Matricula' => $this->faker->unique()->regexify('[A-Z]{4}[0-9]{4}'),
            'Marca' => $this->faker->randomElement(['Seat', 'Renault', 'Fiat', 'Ford', 'Opel', 'Peugeot', 'Citroen', 'Volkswagen', 'Mercedes', 'BMW', 'Audi', 'Toyota', 'Nissan', 'Hyundai', 'Kia', 'Suzuki', 'Mazda', 'Honda', 'Mitsubishi', 'Subaru', 'Lexus', 'Volvo', 'Mini', 'Jaguar', 'Land Rover', 'Porsche', 'Chevrolet', 'Dacia', 'Chrysler', 'Dodge', 'Jeep', 'Ferrari', 'Lamborghini', 'Maserati', 'Alfa Romeo', 'Aston Martin', 'Bentley', 'Cadillac', 'Infiniti', 'Lancia', 'Lotus', 'Mclaren', 'Saab', 'Smart', 'Tesla', 'Bmw', 'Aston martin', 'Bentley', 'Cadillac', 'Infiniti', 'Lancia', 'Lotus', 'Mclaren', 'Saab', 'Smart', 'Tesla']),
            'Modelo' => $this->faker->randomElement(['Ibiza', 'Leon', 'Toledo', 'Cordoba', 'Ateca', 'Altea', 'Alhambra', 'Arona', 'Ateca', 'Cordoba', 'Ibiza', 'Leon', 'Mii', 'Tarraco', 'Tiguan', 'Touran', 'Ateca', 'Cordoba', 'Ibiza', 'Leon', 'Mii', 'Tarraco', 'Tiguan', 'Touran', 'Ateca',
            'Cordoba', 'Ibiza', 'Leon', 'Mii', 'Tarraco', 'Tiguan', 'Touran', 'Ateca', 'Cordoba', 'Ibiza', 'Leon', 'Mii', 'Tarraco',
            'Tiguan', 'Touran', 'Ateca', 'Cordoba', 'Ibiza', 'Leon', 'Mii', 'Tarraco', 'Tiguan'])

        ];
    }
}



