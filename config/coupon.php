<?php

use App\Services\Coupon\Rules as CouponRules;
use Infrastructure\Enums\coupon as CouponEnums;
use App\Services\Coupon\Results as CouponResults;
use App\Validations\CouponRule as CouponRuleValidations;

return [
    'rule' => [
        'classes' => [
            CouponEnums\RuleEnums::USED_COUNT => CouponRules\UsedCount::class
        ],
        'validation_classes' => [
            CouponEnums\RuleEnums::USED_COUNT => CouponRuleValidations\UsedCount::class
        ],
    ],
    'result' => [
        'classes' => [
            CouponEnums\ResultEnums::AMOUNT => CouponResults\Amount::class
        ],
    ],
];
