<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CochesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\coche::factory(10)->create();
    }
}
