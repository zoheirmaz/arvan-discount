<?php

namespace App\Repositories;

use App\Entities\Coupon;
use App\Entities\CouponUsage;
use Infrastructure\Traits\QueryTrait;
use Infrastructure\Traits\EntityRelationsTrait;
use Infrastructure\Repositories\CouponUsageRepositoryInterface;

class CouponUsageRepository implements CouponUsageRepositoryInterface
{
    use EntityRelationsTrait, QueryTrait;

    public function setCouponForUser(Coupon $coupon, $mobile)
    {
        return CouponUsage::create([
            CouponUsage::MOBILE => $mobile,
            CouponUsage::COUPON_ID => $coupon->{Coupon::ID},
        ]);
    }
}
