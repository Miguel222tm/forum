<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = array(
        	["name"=>"Cars\/SUV\/Van\/Trucks","categoryId"=>"1","active"=>true],
        	["name"=>"Trailers","categoryId"=>"1","active"=>true],
        	["name"=>"Boats","categoryId"=>"1","active"=>true],
        	["name"=>"Ships","categoryId"=>"1","active"=>true],
        	["name"=>"Planes","categoryId"=>"1","active"=>true],
        	["name"=>"Bikes","categoryId"=>"2","active"=>true],
        	["name"=>"Canoes","categoryId"=>"2","active"=>true],
        	["name"=>"Boats","categoryId"=>"2","active"=>true],
        	["name"=>"Computers","categoryId"=>"3","active"=>true],
        	["name"=>"PDA","categoryId"=>"3","active"=>true],
        	["name"=>"Cellulars","categoryId"=>"3","active"=>true],
        	["name"=>"Tablets","categoryId"=>"3","active"=>true],
        	["name"=>"Monitors","categoryId"=>"3","active"=>true],
        	["name"=>"Televisions","categoryId"=>"3","active"=>true],
        	["name"=>"Scanners","categoryId"=>"3","active"=>true],
        	["name"=>"Laptops","categoryId"=>"3","active"=>true],
        	["name"=>"Printers","categoryId"=>"3","active"=>true],
        	["name"=>"Photocopiers","categoryId"=>"3","active"=>true],
        	["name"=>"Disk Players","categoryId"=>"3","active"=>true],
        	["name"=>"Home Theater","categoryId"=>"3","active"=>true],
        	["name"=>"Flat Screens","categoryId"=>"3","active"=>true],
        	["name"=>"Beds","categoryId"=>"4","active"=>true],
        	["name"=>"Tables","categoryId"=>"4","active"=>true],
        	["name"=>"Chairs","categoryId"=>"4","active"=>true],
        	["name"=>"Book Cases","categoryId"=>"4","active"=>true],
        	["name"=>"Desks","categoryId"=>"4","active"=>true],
        	["name"=>"Computer Desks","categoryId"=>"4","active"=>true],
        	["name"=>"Living Rooms","categoryId"=>"4","active"=>true],
        	["name"=>"Dinning Tables","categoryId"=>"4","active"=>true],
        	["name"=>"Sofas","categoryId"=>"4","active"=>true],
        	["name"=>"Sofabeds","categoryId"=>"4","active"=>true],
        	["name"=>"Refrigerator","categoryId"=>"5","active"=>true],
        	["name"=>"Freezer","categoryId"=>"5","active"=>true],
        	["name"=>"Frigo Bars","categoryId"=>"5","active"=>true],
        	["name"=>"Dishwashers","categoryId"=>"5","active"=>true],
        	["name"=>"BBQ Grills","categoryId"=>"5","active"=>true],
        	["name"=>"Lawn Mower","categoryId"=>"5","active"=>true],
        	["name"=>"Sewing Machine","categoryId"=>"5","active"=>true],
        	["name"=>"Vacuum Cleaner","categoryId"=>"5","active"=>true],
        	["name"=>"Tents","categoryId"=>"6","active"=>true],
        	["name"=>"Golf Club Sets","categoryId"=>"6","active"=>true],
        	["name"=>"Walkers","categoryId"=>"6","active"=>true],
        	["name"=>"Snow Shoes","categoryId"=>"6","active"=>true],
        	["name"=>"Wetsuits","categoryId"=>"6","active"=>true],
        	["name"=>"Base Ball Bats","categoryId"=>"6","active"=>true],
        	["name"=>"Ice Scates","categoryId"=>"6","active"=>true],
        	["name"=>"Drills","categoryId"=>"7","active"=>true],
        	["name"=>"Ladder","categoryId"=>"7","active"=>true],
        	["name"=>"Screwdriver","categoryId"=>"7","active"=>true],
        	["name"=>"Safety Glasses","categoryId"=>"7","active"=>true],
        	["name"=>"Toolbox","categoryId"=>"7","active"=>true],
        	["name"=>"Axe","categoryId"=>"7","active"=>true],
        	["name"=>"Measuring Tape","categoryId"=>"7","active"=>true],
        	["name"=>"Paintings","categoryId"=>"8","active"=>true],
        	["name"=>"Sculptures","categoryId"=>"8","active"=>true],
        	["name"=>"Collectibles","categoryId"=>"8","active"=>true],
        	["name"=>"Excavators","categoryId"=>"9","active"=>true],
        	["name"=>"Snow Plow and Sander Trucks","categoryId"=>"9","active"=>true],
        	["name"=>"Truck Tractors","categoryId"=>"9","active"=>true],
        	["name"=>"Cranes","categoryId"=>"9","active"=>true],
        	["name"=>"Pressure Washers","categoryId"=>"9","active"=>true],
        	["name"=>"All Terrein Vehicles","categoryId"=>"9","active"=>true],
        	["name"=>"Dozers","categoryId"=>"9","active"=>true],
        	["name"=>"Dump Trailers","categoryId"=>"9","active"=>true],
        	["name"=>"Acoustic Guitar","categoryId"=>"10","active"=>true],
        	["name"=>"Accordion","categoryId"=>"10","active"=>true],
        	["name"=>"Drums","categoryId"=>"10","active"=>true],
        	["name"=>"Flute","categoryId"=>"10","active"=>true],
        	["name"=>"Piano","categoryId"=>"10","active"=>true],
        	["name"=>"Violin","categoryId"=>"10","active"=>true],
        	["name"=>"Violincello","categoryId"=>"10","active"=>true],
        	["name"=>"Photo Camera","categoryId"=>"11","active"=>true],
        	["name"=>"Camcorders","categoryId"=>"11","active"=>true],
        	["name"=>"Headphones","categoryId"=>"11","active"=>true],
        	["name"=>"Cement","categoryId"=>"12","active"=>true],
        	["name"=>"Bricks","categoryId"=>"12","active"=>true],
        	["name"=>"Iron Rod","categoryId"=>"12","active"=>true],
        	["name"=>"Houses","categoryId"=>"13","active"=>true],
        	["name"=>"Town House","categoryId"=>"13","active"=>true],
        	["name"=>"Appartments","categoryId"=>"13","active"=>true],
        	["name"=>"Mansions","categoryId"=>"13","active"=>true],
        	["name"=>"Buildings","categoryId"=>"13","active"=>true],
        	["name"=>"Air Flights","categoryId"=>"14","active"=>true],
        	["name"=>"Hotel Rooms","categoryId"=>"14","active"=>true],
        	["name"=>"Conference Rooms","categoryId"=>"14","active"=>true],
        	["name"=>"Cruises","categoryId"=>"14","active"=>true],
        	["name"=>"Beds","categoryId"=>"15","active"=>true],
        	["name"=>"Scooters","categoryId"=>"15","active"=>true],
        	["name"=>"Wheelchairs","categoryId"=>"15","active"=>true],
        	["name"=>"Shower Chairs","categoryId"=>"15","active"=>true],
        	["name"=>"Bibles","categoryId"=>"16","active"=>true],
        	["name"=>"Dictionaries","categoryId"=>"16","active"=>true],
        	["name"=>"Tonners","categoryId"=>"17","active"=>true],
        	["name"=>"Paper","categoryId"=>"17","active"=>true],
        	["name"=>"Cartriges","categoryId"=>"17","active"=>true],
        	["name"=>"Saplers","categoryId"=>"17","active"=>true],
        	["name"=>"Binders","categoryId"=>"17","active"=>true]
        );
        foreach ($products as $product){
        	App\models\Product::create($product);
        }
    }
}
