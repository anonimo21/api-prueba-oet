<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $fillable = ['person_id'];

    //relacion uno a uno
    public function vehicle()
    {
        return $this->hasOne(Vehicle::class, 'driver_id', 'person_id');
    }

    //relacion uno a uno inversa
    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

}