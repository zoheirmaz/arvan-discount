<?php

namespace App\Policies;

use Infrastructure\Abstracts\PolicyAbstract;

class Coupon extends PolicyAbstract
{
    public function create()
    {
        return true;
    }

    public function apply()
    {
        return true;
    }
}
