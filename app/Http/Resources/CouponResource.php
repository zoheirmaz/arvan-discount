<?php

namespace App\Http\Resources;

use App\Entities\Coupon;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
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
            'id' => $this->{Coupon::ID},
            'title' => $this->{Coupon::TITLE},
            'rules' => $this->{Coupon::RULES},
            'results' => $this->{Coupon::RESULTS},
            'created_at' => $this->{Coupon::CREATED_AT},

            'type' => new EnumerationResource($this->whenLoaded('typeRelation')),
        ];
    }
}
