<?php

use Illuminate\Database\Seeder;

use App\models\CompanySizes;

class CompanySizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes= array(
        	"1" => array(
        		"code"=> "A",
        		"description"=> "Self-employed"
        	),
        	"2" => array(
        		"code"=> "B",
        		"description"=> "1-10 employees"
        	),
        	"3" => array(
        		"code"=> "C",
        		"description"=> "11-50 employees"
        	),
        	"4" => array(
        		"code"=> "D",
        		"description"=> "51-200 employees"
        	),
        	"5" => array(
        		"code"=> "E",
        		"description"=> "201-500 employees"
        	),
        	"6" => array(
        		"code"=> "F",
        		"description"=> "501-1000 employees"
        	),
        	"7" => array(
        		"code"=> "G",
        		"description"=> "1001-5000 employees"
        	),
        	"8" => array(
        		"code"=> "H",
        		"description"=> "5001-10,000 employees"
        	),
        	"9" => array(
        		"code"=> "I",
        		"description"=> "10,001+ employees"
        	)
        );

        foreach ($sizes as $key => $value) {
        	$sizes= new App\models\CompanySizes();
        	$sizes->code= $value['code'];
        	$sizes->description= $value['description'];
        	$sizes->save();
        }
    }
}
