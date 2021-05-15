<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    protected $fillable = ['person_id'];

    //relacion uno a muchos
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'owner_id', 'person_id');
    }

    //relacion uno a uno inversa
    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }
}
