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
    	App\models\Functionality::create([ //1
    		'name' => 'Home',
    		'code' => 'fn_home'
    	]);
        App\models\Functionality::create([ //2
            'name' => 'Search',
            'code' => 'fn_search'
        ]);

    	App\models\Functionality::create([ //3
    		'name' => 'items',
    		'code' => 'fn_items'
    	]);
    	App\models\Functionality::create([ //4
    		'name' => 'Near By',
    		'code' => 'fn_near_by'
    	]);
    	
    	App\models\Functionality::create([ //5
    		'name' => 'Profile',
    		'code' => 'fn_profile'
    	]);

    	App\models\Functionality::create([ //6
    		'name' => 'My Products',
    		'code' => 'fn_my_products'
    	]);

    	App\models\Functionality::create([ //7
    		'name' => 'Categories',
    		'code' => 'fn_categories'
    	]);

        App\models\Functionality::create([ //8
            'name' => 'Requests',
            'code' => 'fn_requests'
        ]);

        App\models\Functionality::create([ //9
            'name' => 'Users',
            'code' => 'fn_users'
        ]);


            App\models\Functionality::create([ //10
                'name' => 'Members',
                'code' => 'fn_users_members'
            ]);
            App\models\Functionality::create([ //11
                'name' => 'Vendors',
                'code' => 'fn_users_vendors'
            ]);
            App\models\Functionality::create([ //12
                'name' => 'Employees',
                'code' => 'fn_users_employees'
            ]);

        App\models\Functionality::create([//13
            'name' => 'My Bids',
            'code' => 'fn_my_bids'
        ]);

        
            
    }
}
