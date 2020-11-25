<?php

namespace App\Services\Coupon;

use App\Entities\Coupon;
use Infrastructure\Exceptions\LogicException;
use Infrastructure\Interfaces\Coupon\ResultAbstract;
use Infrastructure\Interfaces\Coupon\RuleAbstract;

class CouponCalculator
{
    private $coupon;
    private $input;

    public function __construct($input, Coupon $coupon)
    {
        $this->coupon = $coupon;
        $this->input = $input;
    }

    public function calculate()
    {
        if (!$this->checkRules()) {
            throw new LogicException('کد وارد شده شامل شما نمی شود.');
        }

        $this->setCouponForUser();

        return $this->getResults();
    }

    private function checkRules(): bool
    {
        $rules = $this->coupon->{Coupon::RULES};

        foreach ($rules as $rule) {
            $ruleClass = config('coupon.rule.classes')[$rule['rule']];

            /** @var RuleAbstract $ruleObj */
            $ruleObj = new $ruleClass($this->input);

            if (!$ruleObj->check()) {
                return false;
            }
        }

        return true;
    }

    private function getResults(): array
    {
        $couponResults = $this->coupon->{Coupon::RESULTS};

        $finalResult = [];

        foreach ($couponResults as $result) {
            $resultClass = config('coupon.result.classes')[$result['result']];

            /** @var ResultAbstract $resultObj */
            $resultObj = new $resultClass();

            $finalResult = array_merge($finalResult, $resultObj->getResult());
        }

        return $finalResult;
    }

    private function setCouponForUser()
    {
        coupon_usage_repository()->setCouponForUser($this->coupon, $this->input['mobile']);
    }
}
