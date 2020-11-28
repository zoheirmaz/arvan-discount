<?php

namespace Infrastructure\Traits;

trait EntityRelationsTrait
{
    public function couponRelations()
    {
        return [
            'typeRelation',
        ];
    }

    public function couponUsageRelations()
    {
        return [
            'couponRelation',
        ];
    }
}
