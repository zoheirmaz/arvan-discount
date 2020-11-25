<?php

namespace App\Services\Coupon\Rules;

use App\Entities\Coupon;
use App\Entities\CouponUsage;
use Infrastructure\Enums\coupon\RuleEnums;
use Infrastructure\Interfaces\Coupon\RuleAbstract;

class UsedCount extends RuleAbstract
{
    public function check()
    {
        $usageCount = CouponUsage::query()->where(
            CouponUsage::COUPON_ID,
            $this->coupon->{Coupon::ID}
        )->count();

        if ($usageCount < $this->values[0]) {
            return true;
        } else {
            return false;
        }
    }

    protected function ruleId()
    {
        return RuleEnums::USED_COUNT;
    }
}
