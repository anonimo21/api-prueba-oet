<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{

    public function run()
    {
        Driver::create([
            'person_id' => 1,
        ]);
        Driver::create([
            'person_id' => 2,
        ]);
        Driver::create([
            'person_id' => 5,
        ]);
    }
}
