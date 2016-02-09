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
					$al->addFunctionalities([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,19,20,21,22]);
					break;
				case 2: 
					$al->addFunctionalities([1,2,3,12,13,15,17,18,19,21,22,23,24,25,26,27,28,29,30,31, 32]);
					break;
				case 3: 
					$al->addFunctionalities([1,2,12,13,15,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35, 36]);
					break;
				case 4: 
					$al->addFunctionalities([1,2]);
					break;
				case 5:
					$al->addFunctionalities([1,2]);
					break;
				case 6:
					$al->addFunctionalities([1,2]);
					break;
				case 7:
					$al->addFunctionalities([1, 2]);
					break;
			}
			
		}
    }
}
