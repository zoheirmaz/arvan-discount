<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CouponUsageCollection;
use Infrastructure\Abstracts\ControllerAbstract;
use Infrastructure\Repositories\CouponUsageRepositoryInterface;

class CouponUsageController extends ControllerAbstract
{
    public function __construct(CouponUsageRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    protected function usageList(Request $request)
    {
        $data = [
            'mobile' => $request->input('mobile'),
            'coupon_id' => $request->input('coupon_id'),
        ];

        $result = $this->repository->couponUsagesList($data);

        return (new CouponUsageCollection($result['results']))->additional(
            ['totalCount' => $result['totalCount']]
        );
    }
}
