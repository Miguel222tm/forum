<?php

use Illuminate\Database\Seeder;

class AccessLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1, 7)as $index)
		{
			$al = App\models\AccessLevel::create([]);
			switch ($index) {
				case 1:
					$al->addFunctionalities([1,2,3,4]);
					break;
				case 2: 
					$al->addFunctionalities([1,2,6, 13]);
					break;
				case 3: 
					$al->addFunctionalities([1,7,8, 9,10, 11,14]);
					break;
				case 4: 
					$al->addFunctionalities([1,7,8,9,10,11,12,14]);
					break;
				
			}
			
		}
    }
}
