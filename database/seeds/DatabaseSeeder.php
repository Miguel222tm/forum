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

        $this->call(CategoryTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(BrandTableSeeder::class);
        $this->call(ModelTableSeeder::class);
        /**
         * more seeder tables
         */

        Model::reguard();
    }
}
