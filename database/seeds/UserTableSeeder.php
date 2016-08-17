<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $users = array(
                ['name' => 'Ryan Chenkie','firstName'=>'Ryan','lastName'=>'Chenkie', 'email' => 'ryan@gmail.com', 'password' => Hash::make('secret'), 'type' =>1, 'active'=>true],
                ['name' => 'Juan Morales','firstName'=>'Juan','lastName'=>'Morales', 'email' => 'juan@gmail.com', 'password' => Hash::make('secret'), 'type' =>1, 'active'=>true],
                ['name' => 'Miguel Sanchez','firstName'=>'Miguel','lastName'=>'Sanchez', 'email' => 'trevino@gmail.com', 'password' => Hash::make('secret'), 'type' =>1, 'active'=>true],
                ['name' => 'Adnan Kukic','firstName'=>'Adnan','lastName'=>'Kukic', 'email' => 'morales@gmail.com', 'password' => Hash::make('secret'), 'type' =>1, 'active'=>true],
                ['name' => 'Miguel Trevino','firstName'=>'Miguel','lastName'=>'Trevino', 'email' => 'miguel@gmail.com', 'gender' => 'Male', 'password' => Hash::make('xelha110'), 'type' =>1, 'active'=>true],
                ['name' => 'Miguel Trevino','firstName'=>'Miguel','lastName'=>'Trevino', 'email' => 'miguel@clubmein.com', 'gender' => 'Male', 'password' => Hash::make('xelha110'), 'type' =>1, 'active'=>true],

                ['name' => 'Roger Silva','firstName'=>'Roger','lastName'=>'Silva', 'email' => 'rsilva@clubmein.com', 'gender' => 'Male', 'password' => Hash::make('clubmein2016'), 'type' =>3, 'active'=>true],
                ['name' => 'Roger Silva','firstName'=>'Roger','lastName'=>'Silva', 'email' => 'roger.silva@clubmein.com', 'gender' => 'Male', 'password' => Hash::make('clubmein2016'), 'type' =>3, 'active'=>true]

        );
            
        // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            
            $user = App\User::create($user);
            $js = new App\models\Member();
            $js->userId = $user->userId;
                $js->name = $user->name;
                $js->firstName = $user->firstName;
                $js->lastName = $user->lastName;
                $js->email = $user->email;
               
                $js->access_level = 1;
                
                $js->unique_code = str_random(20);
            $js->userId = $user->userId;
            $js->save();
        }
    }
}
