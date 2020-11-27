<?php

namespace App\Validations\CouponRule;

use Infrastructure\Abstracts\ValidationAbstract;

class UsedCount extends ValidationAbstract
{
    public function rules(): array
    {
        return [
            'mobile' => [
                'required',
                'numeric',
            ],
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
