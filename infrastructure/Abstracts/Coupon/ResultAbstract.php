<?php

namespace Infrastructure\Interfaces\Coupon;

abstract class ResultAbstract
{
    protected $values;

    abstract public function getResult();

    public function __construct($values)
    {
        $this->values = $values;
    }
}
