<?php

namespace App\Entities;

use Infrastructure\Abstracts\EntityAbstract;

class CouponUsage extends EntityAbstract
{
    /** @var Coupon $couponRelation */

    public const ID = 'id';
    public const COUPON_ID = 'coupon_id';
    public const MOBILE = 'mobile';

    public const CREATED_BY = 'created_by';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    public const DELETED_AT = 'deleted_at';

    protected $fillable = [
        self::COUPON_ID,
        self::MOBILE,
        self::CREATED_BY,
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates = [
        self::CREATED_AT,
        self::UPDATED_AT,
        self::DELETED_AT,
    ];

    public static function tn()
    {
        return 'coupon_usage';
    }

    public function couponRelation()
    {
        return $this->hasOne(Coupon::class, Coupon::ID, self::COUPON_ID);
    }
}
