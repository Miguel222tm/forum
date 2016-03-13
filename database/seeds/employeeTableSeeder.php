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
        $admin = App\User::where('email', '=', 'rsilva@clubmein.com')->first();
        $employee=  new App\models\Employee();
        $employee->fill($admin);
        $employee->save();
        $admin = App\User::where('email', '=', 'roger.silva@clubmein.com')->first();
        $employee = new App\models\Employee();
        $employee->fill($admin);
        $employee->save();
    }
}
