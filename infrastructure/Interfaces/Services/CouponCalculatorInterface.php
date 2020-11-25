<?php

namespace Infrastructure\Interfaces\Services;

use App\Entities\Coupon;

interface CouponCalculatorInterface
{
    public function __construct($input, Coupon $coupon);

    public function calculate();
}
