<?php

namespace App\Http\Resources\instagram;

use Illuminate\Http\Resources\Json\JsonResource;

class likes.blade.php extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
