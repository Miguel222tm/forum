<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(FunctionalityTableSeeder::class);
       
        $this->call(AccessLevelTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(EmployeeTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(BrandTableSeeder::class);
        $this->call(ModelTableSeeder::class);
<<<<<<< HEAD

        // $this->call(CountrySeederTable::class);
        // $this->call(StateSeederTable::class);
        // $this->call(CitySeederTable::class);
=======
        $this->call(FeeTableSeeder::class);
>>>>>>> 8e5893ede9f47a2ae382ce2284ceb182a1fac9a6
        /**
         * more seeder tables
         */

        Model::reguard();
    }
}
