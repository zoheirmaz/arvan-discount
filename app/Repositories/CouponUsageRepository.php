<?php

namespace App\Repositories;

use App\Entities\Coupon;
use App\Entities\CouponUsage;
use Infrastructure\Traits\QueryTrait;
use Illuminate\Database\Eloquent\Builder;
use Infrastructure\Traits\EntityRelationsTrait;
use Infrastructure\Repositories\CouponUsageRepositoryInterface;

class CouponUsageRepository implements CouponUsageRepositoryInterface
{
    use EntityRelationsTrait, QueryTrait;

    public function setCouponForUser(Coupon $coupon, $mobile)
    {
        return CouponUsage::create([
            CouponUsage::MOBILE => $mobile,
            CouponUsage::COUPON_ID => $coupon->{Coupon::ID},
        ]);
    }

    public function couponUsagesList($filter)
    {
        $query = CouponUsage::query()->with(
            $this->couponUsageRelations()
        );

        $this->appendItemFilterQuery($query, $filter);

        return [
            'results' => $query->get(),
            'totalCount' => $query->count()
        ];
    }

    private function appendItemFilterQuery(Builder $query, $filter)
    {
        if (isset($filter['mobile'])) {
            $query->where(CouponUsage::MOBILE, $filter['mobile']);
        }

        if (isset($filter['coupon_id'])) {
            $query->where(CouponUsage::COUPON_ID, $filter['coupon_id']);
        }
    }
}
