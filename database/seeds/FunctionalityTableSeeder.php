<?php

use Illuminate\Database\Seeder;

use App\models;

class FunctionalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	App\models\Functionality::create([
    		'name' => 'Home',
    		'code' => 'fn_home'
    	]);
        App\models\Functionality::create([
            'name' => 'Search',
            'code' => 'fn_search'
        ]);

    	App\models\Functionality::create([
    		'name' => 'items',
    		'code' => 'fn_items'
    	]);
    	App\models\Functionality::create([
    		'name' => 'Near By',
    		'code' => 'fn_near_by'
    	]);
    	
    	App\models\Functionality::create([
    		'name' => 'Profile',
    		'code' => 'fn_profile'
    	]);

    	App\models\Functionality::create([
    		'name' => 'My Products',
    		'code' => 'fn_my_products'
    	]);
    	App\models\Functionality::create([
    		'name' => 'My Bids',
    		'code' => 'fn_my_bids'
    	]);
        
    }
}
