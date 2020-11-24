<?php

namespace App\Http\Controllers;

use App\Entities\Coupon;
use Illuminate\Http\Request;
use App\Http\Resources\CouponResource;
use Infrastructure\Abstracts\ControllerAbstract;
use App\Http\Resources\CouponRulesResultsResource;
use Infrastructure\Repositories\CouponRepositoryInterface;

class CouponController extends ControllerAbstract
{
    public function __construct(CouponRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    protected function create(Request $request)
    {
        $data = [
            'title' => $request->input('title'),
            'type' => $request->input('type'),
            'rules' => $request->input('rules'),
            'results' => $request->input('results'),
        ];

        $result = $this->repository->create($data);

        $coupon = $this->repository->findById($result->{Coupon::ID});

        return new CouponResource($coupon);
    }

    protected function view(Request $request)
    {
        $result = $this->repository->findById($request->get('id'));

        return (new CouponResource($result));
    }

    protected function getCouponRulesAndResults()
    {
        $rulesAndResults = enumeration_repository()->findCouponRulesAndResults();

        return new CouponRulesResultsResource($rulesAndResults);
    }
}
