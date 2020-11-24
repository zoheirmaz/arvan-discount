<?php

use App\Entities\Transaction;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use Illuminate\Support\Facades\Auth;
use Shetabit\Multipay\Abstracts\Driver;
use App\Entities\Payment as PaymentEntity;
use Infrastructure\Enums\PaymentGatewaysEnums;
use Infrastructure\Enums\TransactionStatusEnums;
use Infrastructure\Repositories as RepositoriesInterfaces;

if (!function_exists('pay')) {
    function pay(PaymentEntity $payment)
    {
        return Payment::purchase(
            (new Invoice)->amount(1000)->detail(
                'mobile',
//                Auth::user()->{User::MOBILE}
                '09195824409'
            ),
            function (Driver $driver, $transactionId) use ($payment) {
                Transaction::create([
                    Transaction::CREATED_BY => Auth::id(),
                    Transaction::TRANSACTION_ID => $transactionId,
                    Transaction::GATEWAY => PaymentGatewaysEnums::ZARINPAL,
                    Transaction::STATUS => TransactionStatusEnums::WAITING,
                    Transaction::PAYMENT_ID => $payment->{PaymentEntity::ID},
                ]);
            }
        )->pay()->render();
    }
}

if (!function_exists('enumeration_repository')) {
    /**
     * @return \Infrastructure\Repositories\EnumerationRepositoryInterface
     */
    function enumeration_repository()
    {
        return app(\Infrastructure\Repositories\EnumerationRepositoryInterface::class);
    }
}

if (!function_exists('coupon_usage_repository')) {
    /**
     * @return RepositoriesInterfaces\CouponUsageRepositoryInterface
     */
    function coupon_usage_repository()
    {
        return app(RepositoriesInterfaces\CouponUsageRepositoryInterface::class);
    }
}
