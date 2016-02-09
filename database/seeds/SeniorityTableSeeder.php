<?php

use Illuminate\Database\Seeder;

use App\models\Seniority;

class SeniorityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seniority = array(
        	"1"=> array(
        		"analytics_code"=> "1",
        		"targeting_code"=> "up",
        		"description"=> "Unpaid"
        	),
        	"2"=> array(
        		"analytics_code"=> "2",
        		"targeting_code"=> "tr",
        		"description"=> "Training"
        	),
        	"3"=> array(
        		"analytics_code"=> "3",
        		"targeting_code"=> "en",
        		"description"=> "Entry-level"
        	),
        	"4"=> array(
        		"analytics_code"=> "4",
        		"targeting_code"=> "ic",
        		"description"=> "Senior"
        	),
        	"5"=> array(
        		"analytics_code"=> "5",
        		"targeting_code"=> "m",
        		"description"=> "Manager"
        	),
        	"6"=> array(
        		"analytics_code"=> "6",
        		"targeting_code"=> "d",
        		"description"=> "Director"
        	),
        	"7"=> array(
        		"analytics_code"=> "7",
        		"targeting_code"=> "vp",
        		"description"=> "Vice President (VP)"
        	),
        	"8"=> array(
        		"analytics_code"=> "8",
        		"targeting_code"=> "c",
        		"description"=> "Chief X Officer (CxO)"
        	),
        	"9"=> array(
        		"analytics_code"=> "9",
        		"targeting_code"=> "p",
        		"description"=> "Partner"
        	),
        	"10"=> array(
        		"analytics_code"=> "10",
        		"targeting_code"=> "o",
        		"description"=> "Owner"
        	)
        );

		foreach ($seniority as $key => $value) {
			$se= new App\models\Seniority();
			$se->analytics_code= $value['analytics_code'];
			$se->targeting_code= $value['targeting_code'];
			$se->description= $value['description'];
			$se->save();
		}
    }
}
