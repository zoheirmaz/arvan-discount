<?php

namespace App\Providers;

use App\Services as Services;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Interfaces\Services as ServiceInterfaces;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ServiceInterfaces\CouponCalculatorInterface::class,
            Services\Coupon\CouponCalculator::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
