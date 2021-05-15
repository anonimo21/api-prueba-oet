<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $fillable = ['tipo'];

    //relacion uno a muchos
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'type_id', 'id');
    }
}
