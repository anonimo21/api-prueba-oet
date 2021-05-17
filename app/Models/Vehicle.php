<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = ['placa', 'color', 'marca', 'type_id', 'driver_id', 'owner_id'];

    //relacion uno a muchos inversa
    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id', 'person_id');
    }

    //relacion uno a uno inversa
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'person_id');
    }

    //relacion uno a muchos inversa
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
}
