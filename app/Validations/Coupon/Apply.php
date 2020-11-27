<?php

namespace App\Validations\Coupon;

use Infrastructure\Abstracts\ValidationAbstract;

class Apply extends ValidationAbstract
{
    public function rules(): array
    {
        return [
            'coupon_id' => [
                'required',
                'integer',
            ],
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
