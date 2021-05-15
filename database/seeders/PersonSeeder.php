<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{

    public function run()
    {
        Person::create([
            'cedula' => '123456789',
            'primer_nombre'=>'eder',
            'segundo_nombre' => 'luis',
            'apellidos' => 'montiel',
            'direccion' => 'el dorado',
            'telefono' => '365475643',
            'ciudad' => 'bogota',
        ]);
        Person::create([
            'cedula' => '7876878768',
            'primer_nombre'=>'andrea',
            'segundo_nombre' => 'maria',
            'apellidos' => 'diaz',
            'direccion' => 'el poblado',
            'telefono' => '756756756',
            'ciudad' => 'medellin',
        ]);
        Person::create([
            'cedula' => '76786786',
            'primer_nombre'=>'elkin',
            'segundo_nombre' => 'jose',
            'apellidos' => 'ortiz',
            'direccion' => 'la pradera',
            'telefono' => '657657657',
            'ciudad' => 'monteria',
        ]);
        Person::create([
            'cedula' => '56756756',
            'primer_nombre'=>'lisa',
            'segundo_nombre' => 'maria',
            'apellidos' => 'miranda',
            'direccion' => 'la pradera',
            'telefono' => '5675676',
            'ciudad' => 'cartagena',
        ]);
        Person::create([
            'cedula' => '64564564',
            'primer_nombre'=>'felipe',
            'segundo_nombre' => 'jose',
            'apellidos' => 'andrade',
            'direccion' => 'barrio polo',
            'telefono' => '456456',
            'ciudad' => 'barranquilla',
        ]);
    }
}
