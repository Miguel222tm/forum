<?php

use Illuminate\Database\Seeder;

class TypeOfUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $types = array(
                ['code' => 'js' ,'description' => 'Job Seeker'],
                ['code' => 'hrm' ,'description' => 'Human Resources Manager'],
                ['code' => 'cmp' ,'description' => 'Company'],
                ['code' => 'int' ,'description' => 'interviewer'],
                ['code' => 'emp' ,'description' => 'Employee'],
                ['code' => 'g' ,'description' => 'Guest']

        );
            
        // Loop through each user above and create the record for them in the database
        foreach ($types as $type)
        {
            App\models\TypeOfUser::create($type);
        }
    }
}
