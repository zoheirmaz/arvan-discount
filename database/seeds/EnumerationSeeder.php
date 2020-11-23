<?php

use App\Entities\Enumeration;
use Illuminate\Database\Seeder;

class EnumerationSeeder extends Seeder
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
            Enumeration::ID => 2,
            Enumeration::TITLE => 'coupon results',
        ]);
    }
}
