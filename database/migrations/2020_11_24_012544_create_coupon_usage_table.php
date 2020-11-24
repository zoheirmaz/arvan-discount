<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponUsageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_usage', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('coupon_id');
            $table->text('mobile');

            $table->timestamps();
            $table->softDeletes();
            $table->text('created_by')->nullable();
        });

        Schema::table('coupons', function (Blueprint $table) {
            $table->foreign('coupon_id')->references('id')->on('coupons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupon_usage');
    }
}
