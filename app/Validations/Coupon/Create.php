<?php

namespace App\Validations\Coupon;

use Infrastructure\Abstracts\ValidationAbstract;

class Create extends ValidationAbstract
{
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
            ],
            'type' => [
                'required',
                'integer',
            ],
            'rules' => [
                'required',
                'array',
            ],
            'results' => [
                'required',
                'array',
            ],
            'rules.*.rule' => [
                'required',
                'int',
            ],
            'rules.*.values' => [
                'required',
                'array',
            ],
            'results.*.result' => [
                'required',
                'int',
            ],
            'results.*.values' => [
                'required',
                'array',
            ],
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
