<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Owner extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->person_id,
            'owner' => $this->person
        ];
    }
}
