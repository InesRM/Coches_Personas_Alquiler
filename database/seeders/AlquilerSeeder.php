<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AlquilerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\alquiler::factory(10)->create();
    }
}
