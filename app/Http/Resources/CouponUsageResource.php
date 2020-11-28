<?php

namespace App\Http\Resources;

use App\Entities\Coupon;
use App\Entities\CouponUsage;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponUsageResource extends JsonResource
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
            'mobile' => $this->{CouponUsage::MOBILE},
            'coupon' => new CouponResource($this->whenLoaded('couponRelation')),
            'created_at' => $this->{Coupon::CREATED_AT},
        ];
    }
}
