<?php

namespace Infrastructure\Repositories;

interface CouponRepositoryInterface
{
    public function findById($id);

    public function create($data);
}
