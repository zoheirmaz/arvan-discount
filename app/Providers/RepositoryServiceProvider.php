<?php

namespace App\Providers;

use App\Repositories as Repositories;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Repositories\CouponRepositoryInterface;
use Infrastructure\Repositories\CouponUsageRepositoryInterface;
use Infrastructure\Repositories\EnumerationRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            EnumerationRepositoryInterface::class,
            Repositories\EnumerationRepository::class
        );

        $this->app->bind(
            CouponRepositoryInterface::class,
            Repositories\CouponRepository::class
        );

        $this->app->bind(
            CouponUsageRepositoryInterface::class,
            Repositories\CouponUsageRepository::class
        );
    }
}
