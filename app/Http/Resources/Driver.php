<?php

namespace App\Http\Resources;

use App\Models\Driver as ModelsDriver;
use Illuminate\Http\Resources\Json\JsonResource;

class Driver extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->person_id,
            'driver' => $this->person
        ];
    }
}
