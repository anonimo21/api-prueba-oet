<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';

    protected $primaryKey = 'id';

    protected $fillable = ['cedula', 'primer_nombre', 'segundo_nombre', 'apellidos', 'direccion', 'telefono', 'ciudad'];

    protected $hidden = ['created_at', 'updated_at'];

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
