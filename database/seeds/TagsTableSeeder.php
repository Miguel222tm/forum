<?php

use Illuminate\Database\Seeder;
use App\models\Tag;
class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	Tag::create([
       		'name' => 'error'
       	]);

       	Tag::create([
       		'name' => 'security'
       	]);

       	Tag::create([
       		'name' => 'design'
       	]);

       	Tag::create([
       		'name' => 'support'
       	]);

       	Tag::create([
       		'name' => 'price'
       	]);
       	Tag::create([
       		'name' => 'login'
       	]);

    }
}
