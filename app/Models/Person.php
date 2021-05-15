<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $table = 'persons';
    protected $fillable = ['cedula', 'primer_nombre', 'segundo_nombre', 'apellidos', 'direccion', 'telefono', 'ciudad'];

    //relacion uno a uno
    public function driver()
    {
        return $this->hasOne(Driver::class, 'person_id', 'id');
    }

    //relacion uno a uno
    public function owner()
    {
        return $this->hasOne(Owner::class, 'person_id', 'id');
    }
}
