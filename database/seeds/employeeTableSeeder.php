<?php

use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = App\User::where('email', '=', 'rsilva@clubmein.com')->first();
        $employee=  new App\models\Employee();
        $employee->userId = $admin->userId;
        $employee->name = $admin->name;
        $employee->firstName = $admin->firstName;
        $employee->lastName = $admin->lastName;
        $employee->email = $admin->email;
        $employee->gender = $admin->gender;
        $employee->access_level  = 4;
        $employee->save();
        $admin = App\User::where('email', '=', 'roger.silva@clubmein.com')->first();
        $employee = new App\models\Employee();
        $employee->userId = $admin->userId;
        $employee->name = $admin->name;
        $employee->firstName = $admin->firstName;
        $employee->lastName = $admin->lastName;
        $employee->email = $admin->email;
        $employee->gender = $admin->gender;
        $employee->access_level  = 4;
        $employee->save();
    }
}
