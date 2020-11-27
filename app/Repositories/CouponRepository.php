<?php

namespace App\Repositories;

use App\Entities\Coupon;
use Illuminate\Support\Facades\Auth;
use Infrastructure\Traits\QueryTrait;
use Infrastructure\Traits\EntityRelationsTrait;
use Infrastructure\Repositories\CouponRepositoryInterface;

class CouponRepository implements CouponRepositoryInterface
{
    use EntityRelationsTrait, QueryTrait;

    public function findById($id)
    {
        return Coupon::query()
            ->with($this->couponRelations())
            ->findOrFail($id);
    }

    public function create($data)
    {
        return Coupon::create([
            Coupon::TITLE => $data['title'],
            Coupon::TYPE => $data['type'],
            Coupon::RULES => $this->uniqueData($data['rules'], 'rule'),
            Coupon::RESULTS => $this->uniqueData($data['results'], 'result'),
            Coupon::CREATED_BY => Auth::id(),
        ]);
    }

    private function uniqueData(array $data, $key): array
    {
        return collect($data)->unique($key)->toArray();
    }

    public function applyForUser($input, $couponId)
    {
        $coupon = $this->findById($couponId);

        return coupon_calculator($input, $coupon)->calculate();
    }
}
