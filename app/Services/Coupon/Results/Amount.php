<?php

namespace App\Services\Coupon\Results;

use Infrastructure\Interfaces\Coupon\ResultAbstract;

class Amount extends ResultAbstract
{
    public function getResult()
    {
        return ['amount' => $this->values[0]];
    }
}
