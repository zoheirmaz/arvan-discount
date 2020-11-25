<?php

namespace App\Validations\CouponUsage;

use Infrastructure\Abstracts\ValidationAbstract;

class UsageList extends ValidationAbstract
{
    public function rules(): array
    {
        return [
            'coupon_id' => [
                'integer',
            ],
            'mobile' => [
                'numeric',
            ],
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
