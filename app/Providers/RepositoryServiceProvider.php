<?php

namespace App\Providers;

use App\Repositories as Repositories;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Repositories\CouponRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->app->bind(
            CouponRepositoryInterface::class,
            Repositories\CouponRepository::class
        );
    }
}
