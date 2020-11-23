<?php

namespace App\Http\Resources;

use App\Entities\Enumeration;
use Illuminate\Http\Resources\Json\JsonResource;

class EnumerationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->{Enumeration::ID},
            'title' => $this->{Enumeration::TITLE},
        ];
    }
}
