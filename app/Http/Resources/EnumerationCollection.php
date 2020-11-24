<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EnumerationCollection extends ResourceCollection
{
    public $collects = EnumerationResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param $data
     * @return array
     */
    public function toArray($data)
    {
        return parent::toArray($this->collection);
    }
}
