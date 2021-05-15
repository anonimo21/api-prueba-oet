<?php

namespace App\Http\Resources;

use App\Models\Driver;
use App\Models\Owner;
use App\Models\Type;
use Illuminate\Http\Resources\Json\JsonResource;

class Vehicle extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'placa' => $this->placa,
            'color' => $this->color,
            'marca' => $this->marca,
            'tipo' => Type::find($this->type_id),
            'driver' => Driver::where('person_id', $this->driver_id)->with('person')->first(),
            'owner' => Owner::where('person_id', $this->owner_id)->with('person')->first(),
        ];
    }
}
