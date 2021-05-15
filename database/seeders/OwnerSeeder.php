<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{

    public function run()
    {
        Owner::create([
            'person_id' => 3,
        ]);
        Owner::create([
            'person_id' => 4,
        ]);
    }
}
