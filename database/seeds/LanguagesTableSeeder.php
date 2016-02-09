<?php

use Illuminate\Database\Seeder;
use App\models\Languages;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
    	/**
    	 * languages
    	 */
    	$languages =array(
            "1"=> array(
                'code'=> 'en_US',
                'description'=> 'English' 

            ),
            "2"=> array(
                'code'=> 'ar_AE',
                'description'=> 'Arabic' 

            ),
            "3"=> array(
                'code'=> 'zh_CN',
                'description'=> 'Chinesse - Simplified' 

            ),
            "4"=> array(
                'code'=> 'zh_CN',
                'description'=> 'Chinesse - Traditional' 

            ),
            "5"=> array(
                'code'=> 'cs_CZ',
                'description'=> 'Czech' 

            ),
            "6"=> array(
                'code'=> 'da_DK',
                'description'=> 'Danish' 

            ),
            "7"=> array(
                'code'=> 'nl_NL',
                'description'=> 'Dutch' 

            ),
            "8"=> array(
                'code'=> 'fr_FR',
                'description'=> 'French' 

            ),
            "9"=> array(
                'code'=> 'de_DE',
                'description'=> 'German' 

            ),
            "10"=> array(
                'code'=> 'in_ID',
                'description'=> 'Indonesian' 

            ),
            "11"=> array(
                'code'=> 'it_IT',
                'description'=> 'Italian' 

            ),
            "12"=> array(
                'code'=> 'ja_JP',
                'description'=> 'Japanese' 

            ),
            "13"=> array(
                'code'=> 'ko_KR',
                'description'=> 'Korean' 

            ),
            "14"=> array(
                'code'=> 'ms_MY',
                'description'=> 'Malay' 

            ),
            "15"=> array(
                'code'=> 'no_NO',
                'description'=> 'Norwegian' 

            ),
            "16"=> array(
                'code'=> 'pl_PL',
                'description'=> 'Polish' 

            ),
            "17"=> array(
                'code'=> 'pt_BR',
                'description'=> 'Portuguese' 

            ),
            "18"=> array(
                'code'=> 'ro_RO',
                'description'=> 'Romanian' 

            ),
            "19"=> array(
                'code'=> 'ru_RU',
                'description'=> 'Russian' 

            ),
            "20"=> array(
                'code'=> 'es_ES',
                'description'=> 'Spanish' 

            ),
            "21"=> array(
                'code'=> 'sv_SE',
                'description'=> 'Swedish' 

            ),
            "22"=> array(
                'code'=> 'tl_PH',
                'description'=> 'Tagalog' 

            ),
            "23"=> array(
                'code'=> 'th_TH',
                'description'=> 'Thai' 

            ),
            "24"=> array(
                'code'=> 'tr_TR',
                'description'=> 'Turkish' 

            )

        );
        foreach ($languages as $key => $value) {
           $lan= new App\models\Languages();
           $lan->code= $value['code'];
           $lan->description= $value['description'];
           $lan->save();
        }

    }
}
