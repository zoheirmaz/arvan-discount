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
            Enumeration::ID => 4,
            Enumeration::TITLE => 'parent'
        ]);

        Enumeration::create([
            Enumeration::ID => 5,
            Enumeration::TITLE => 'discount',
            Enumeration::PARENT_ID => 4,
        ]);

        Enumeration::create([
            Enumeration::ID => 6,
            Enumeration::TITLE => 'CREDIT',
            Enumeration::PARENT_ID => 4,
        ]);
    }
}
