<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();

            $table->text('title');
            $table->unsignedBigInteger('type');
            $table->longText('rules');
            $table->longText('results');

            $table->timestamps();
            $table->softDeletes();
            $table->text('created_by')->nullable();
        });

        Schema::table('coupons', function (Blueprint $table) {
            $table->foreign('type')->references('id')->on('enumerations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
