<?php

use Illuminate\Database\Seeder;

class FeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feeTypes = array(
        	['code'=> 'fn_free', 'name'=>'Free', 'description'=> 'free cuota', 'from'=> 1, 'to'=> 50, 'percentage' => 0, 'active'=>true],
        	['code'=> 'fn_small', 'name'=>'Small fee', 'description'=> 'Small fee description', 'from'=> 51, 'to'=> 100, 'percentage' => 1, 'active'=>true],
        	['code'=> 'fn_medium', 'name'=>'Medium fee', 'description'=> 'Medium fee description', 'from'=> 101, 'to'=> 500, 'percentage' => 0.5, 'active'=>true],
        	['code'=> 'fn_big', 'name'=>'Big fee', 'description'=> 'Big fee description', 'from'=> 501, 'to'=> 5000, 'percentage' => 0.2, 'active'=>true]
        );

        foreach ($feeTypes as $fee) {
        	App\models\Fee::create($fee);
        }
    }
}
