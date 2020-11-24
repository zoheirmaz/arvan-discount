<?php

namespace Infrastructure\Repositories;

use App\Entities\Coupon;

interface CouponUsageRepositoryInterface
{
    public function setCouponForUser(Coupon $coupon, $mobile);
}
