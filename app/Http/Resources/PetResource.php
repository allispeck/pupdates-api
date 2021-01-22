<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->resource->name,
            'date_of_birth' => $this->resource->date_of_birth,
            'breed' => $this->resource->breed,
            'user_id' => $this->resource->user_id,
        ];
    }
}
