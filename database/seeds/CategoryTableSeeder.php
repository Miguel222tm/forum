<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category  = array(
        	["name"=>"Motorized Transportation","code"=>"mv","active"=>true],
        	["name"=>"Non Motorized Transportation","code"=>"nv","active"=>true],
        	["name"=>"Electronics","code"=>"el","active"=>true],
        	["name"=>"Furniture","code"=>"fu","active"=>true],
        	["name"=>"Appliances","code"=>"ap","active"=>true],
        	["name"=>"Sporting Goods","code"=>"sp","active"=>true],
        	["name"=>"Tools","code"=>"tl","active"=>true],
        	["name"=>"Art-Crafts","code"=>"ac","active"=>true],
        	["name"=>"Heavy Equipment","code"=>"he","active"=>true],
        	["name"=>"Music Instruments","code"=>"mu","active"=>true],
        	["name"=>"Photo-Video","code"=>"ph","active"=>true],
        	["name"=>"Construction Material","code"=>"cm","active"=>true],
        	["name"=>"Housing","code"=>"ho","active"=>true],
        	["name"=>"Travel","code"=>"tr","active"=>true],
        	["name"=>"Medical Equipment","code"=>"me","active"=>true],
        	["name"=>"Books","code"=>"bk","active"=>true],
        	["name"=>"Office Supplies","code"=>"os","active"=>true]
        );
		
		foreach($category as $cat){
			App\models\Category::create($cat);
		}
    }
}
