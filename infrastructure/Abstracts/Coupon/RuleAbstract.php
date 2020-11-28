<?php

namespace Infrastructure\Interfaces\Coupon;

use App\Entities\Coupon;
use Illuminate\Support\Facades\Validator;
use Infrastructure\Abstracts\ValidationAbstract;
use Infrastructure\Exceptions\ValidatorException;

abstract class RuleAbstract
{
    protected $input;
    protected $values;
    protected $coupon;

    abstract public function check();

    abstract protected function ruleId();

    public function __construct($input, $values, Coupon $coupon)
    {
        $this->input = $input;
        $this->values = $values;
        $this->coupon = $coupon;

        $this->checkValidation();
    }

    private function checkValidation()
    {
        $validationClass = config('coupon.rule.validation_classes')[$this->ruleId()];

        if (!class_exists($validationClass)) {
            throw new \Exception("class `{$validationClass}` not  exists!!!");
        }

        /** @var ValidationAbstract $validationObj */
        $validationObj = new $validationClass();

        $validator = Validator::make(
            $this->input,
            $validationObj->rules(),
            $validationObj->messages()
        );

        if ($validator->fails()) {
            throw new ValidatorException(collect($validator->errors()));
        }
    }
}
