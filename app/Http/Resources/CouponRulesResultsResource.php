<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CouponRulesResultsResource extends JsonResource
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
            'rules' => new EnumerationCollection($this['rules']),
            'results' => new EnumerationCollection($this['results']),
        ];
    }
}
