<?php

use App\Entities\Enumeration;
use Illuminate\Database\Seeder;

class CouponRulesResultsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Enumeration::create([
            Enumeration::ID => 1,
            Enumeration::TITLE => 'coupon rules'
        ]);

        Enumeration::create([
            Enumeration::ID => 3,
            Enumeration::TITLE => 'using count',
            Enumeration::PARENT_ID => 1,
        ]);

        Enumeration::create([
            Enumeration::ID => 2,
            Enumeration::TITLE => 'coupon results',
        ]);

        Enumeration::create([
            Enumeration::ID => 7,
            Enumeration::TITLE => 'amount',
            Enumeration::PARENT_ID => 2,
        ]);
    }
}
