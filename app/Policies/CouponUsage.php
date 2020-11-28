<?php

namespace App\Policies;

use Infrastructure\Abstracts\PolicyAbstract;

class CouponUsage extends PolicyAbstract
{
    public function usageList()
    {
        return true;
    }
}
