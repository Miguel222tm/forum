<?php

use Illuminate\Database\Seeder;

use App\models\JobFunction;

class JobFunctionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $function = array(
        	"-1"=> array(
        		"analytics_code"=> "-1",
        		"targeting_code"=> "",
        		"description"=> "none"
        	),
        	"1"=> array(
        		"analytics_code"=> "1",
        		"targeting_code"=> "acct",
        		"description"=> "Accounting"
        	),
        	"2"=> array(
        		"analytics_code"=> "2",
        		"targeting_code"=> "admn",
        		"description"=> "Administrative"
        	),
        	"3"=> array(
        		"analytics_code"=> "3",
        		"targeting_code"=> "cre",
        		"description"=> "Arts and Design"
        	),
        	"4"=> array(
        		"analytics_code"=> "4",
        		"targeting_code"=> "bd",
        		"description"=> "Business Development"
        	),
        	"5"=> array(
        		"analytics_code"=> "5",
        		"targeting_code"=> "css",
        		"description"=> "Community & Social Services"
        	),
        	"6"=> array(
        		"analytics_code"=> "6",
        		"targeting_code"=> "cnsl",
        		"description"=> "Consulting"
        	),
        	"7"=> array(
        		"analytics_code"=> "7",
        		"targeting_code"=> "edu",
        		"description"=> "Education"
        	),
        	"8"=> array(
        		"analytics_code"=> "8",
        		"targeting_code"=> "eng",
        		"description"=> "Engineering"
        	),
        	"9"=> array(
        		"analytics_code"=> "9",
        		"targeting_code"=> "ent",
        		"description"=> "Entrepreneurship"
        	),
        	"10"=> array(
        		"analytics_code"=> "10",
        		"targeting_code"=> "finc",
        		"description"=> "Finance"
        	),
        	"11"=> array(
        		"analytics_code"=> "11",
        		"targeting_code"=> "med",
        		"description"=> "Healthcare Services"
        	),
        	"12"=> array(
        		"analytics_code"=> "12",
        		"targeting_code"=> "hr",
        		"description"=> "Human Resources"
        	),
        	"13"=> array(
        		"analytics_code"=> "13",
        		"targeting_code"=> "it",
        		"description"=> "Information Technology"
        	),
        	"14"=> array(
        		"analytics_code"=> "14",
        		"targeting_code"=> "lgl",
        		"description"=> "Legal"
        	),
        	"15"=> array(
        		"analytics_code"=> "15",
        		"targeting_code"=> "mktg",
        		"description"=> "Marketing"
        	),
        	"16"=> array(
        		"analytics_code"=> "16",
        		"targeting_code"=> "pr",
        		"description"=> "Media & Communications"
        	),
        	"17"=> array(
        		"analytics_code"=> "17",
        		"targeting_code"=> "mps",
        		"description"=> "Military & Protective Services"
        	),
        	"18"=> array(
        		"analytics_code"=> "18",
        		"targeting_code"=> "ops",
        		"description"=> "Operations"
        	),
        	"19"=> array(
        		"analytics_code"=> "19",
        		"targeting_code"=> "prod",
        		"description"=> "Product Management"
        	),
        	"20"=> array(
        		"analytics_code"=> "20",
        		"targeting_code"=> "ppm",
        		"description"=> "Program & Product Management"
        	),
        	"21"=> array(
        		"analytics_code"=> "21",
        		"targeting_code"=> "buy",
        		"description"=> "Purchasing"
        	),
        	"22"=> array(
        		"analytics_code"=> "22",
        		"targeting_code"=> "qa",
        		"description"=> "Quality Assurance"
        	),
        	"23"=> array(
        		"analytics_code"=> "23",
        		"targeting_code"=> "re",
        		"description"=> "Real Estate"
        	),
        	"24"=> array(
        		"analytics_code"=> "24",
        		"targeting_code"=> "acad",
        		"description"=> "Rersearch"
        	),
        	"25"=> array(
        		"analytics_code"=> "25",
        		"targeting_code"=> "sale",
        		"description"=> "Sales"
        	),
        	"26"=> array(
        		"analytics_code"=> "26",
        		"targeting_code"=> "supp",
        		"description"=> "Support"
        	),
        );
		foreach ($function as $key => $value) {
			$func= new App\models\JobFunction();
			$func->analytics_code=$value['analytics_code'];
			$func->targeting_code=$value['targeting_code'];
			$func->description=$value['description'];
			$func->save();
		}


    }
}
