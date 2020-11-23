<?php

namespace App\Entities;

use Infrastructure\Abstracts\EntityAbstract;

class Coupon extends EntityAbstract
{
    /** @var Enumeration $typeRelation */

    public const ID = 'id';
    public const TYPE = 'type';
    public const TITLE = 'title';
    public const RULES = 'rules';
    public const RESULTS = 'results';

    public const CREATED_BY = 'created_by';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    public const DELETED_AT = 'deleted_at';

    protected $fillable = [
        self::TYPE,
        self::TITLE,
        self::RULES,
        self::RESULTS,
        self::CREATED_BY,
    ];

    protected $casts = [
        self::RULES => 'array',
        self::RESULTS => 'array',
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
        return 'coupons';
    }

    public function typeRelation()
    {
        return $this->hasOne(Enumeration::class, Enumeration::ID, self::TYPE);
    }
}
