<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{

    public function run()
    {
        $data = [
            ['tipo' => 'publico'],
            ['tipo' => 'privado']
        ];
        foreach ($data as $tipo) {
            Type::create($tipo);
        }
    }
}
