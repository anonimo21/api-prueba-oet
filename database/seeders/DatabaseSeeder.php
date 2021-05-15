<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(TypeSeeder::class);
        $this->call(PersonSeeder::class);
        $this->call(DriverSeeder::class);
        $this->call(OwnerSeeder::class);
        $this->call(VehicleSeeder::class);
    }
}