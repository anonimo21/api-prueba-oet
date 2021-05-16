<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        Vehicle::create([
            'placa' => 'LRR127',
            'color' => 'rojo',
            'marca' => 'mazda',
            'type_id' => 2,
            'driver_id' => 1,
            'owner_id' => 3,
        ]);
        // Vehicle::create([
        //     'placa' => 'XYQ457',
        //     'color' => 'azul',
        //     'marca' => 'toyota',
        //     'type_id' => 1,
        //     'driver_id' => 2,
        //     'owner_id' => 3,
        // ]);
        // Vehicle::create([
        //     'placa' => 'IYU790',
        //     'color' => 'azul',
        //     'marca' => 'chevrolet',
        //     'type_id' => 2,
        //     'driver_id' => 5,
        //     'owner_id' => 4,
        // ]);
    }
}
