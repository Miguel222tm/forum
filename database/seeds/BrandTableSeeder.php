<?php

use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = array(
        	["name"=>"Dell","productId"=>"12","active"=> true],
        	["name"=>"Motorola","productId"=>"14","active"=> true],
        	["name"=>"LG","productId"=>"17","active"=> true],
        	["name"=>"Toshiba","productId"=>"19","active"=> true],
        	["name"=>"SKULL CANDY","productId"=>"77","active"=> true],
        	["name"=>"MERRIAM WEBSTER","productId"=>"95","active"=> true],
        	["name"=>"SAMSUNG CEL","productId"=>"14","active"=> true],
        	["name"=>"SAMSUNG TV","productId"=>"17","active"=> true],
        	["name"=>"APPLE","productId"=>"12","active"=> true],
        	["name"=>"Apple cells","productId"=>"14","active"=> true],
        	["name"=>"Acura","productId"=>"1","active"=> true],
        	["name"=>"Audi","productId"=>"1","active"=> true],
        	["name"=>"BMW","productId"=>"1","active"=> true],
        	["name"=>"Buick","productId"=>"1","active"=> true],
        	["name"=>"Cadillac","productId"=>"1","active"=> true],
        	["name"=>"Chevrolet","productId"=>"1","active"=> true],
        	["name"=>"Chrysler","productId"=>"1","active"=> true],
        	["name"=>"Dodge","productId"=>"1","active"=> true],
        	["name"=>"FIAT","productId"=>"1","active"=> true],
        	["name"=>"Ford","productId"=>"1","active"=> true],
        	["name"=>"GMC","productId"=>"1","active"=> true],
        	["name"=>"Honda","productId"=>"1","active"=> true],
        	["name"=>"Hyundai","productId"=>"1","active"=> true],
        	["name"=>"Infiniti","productId"=>"1","active"=> true],
        	["name"=>"Jaguar","productId"=>"1","active"=> true],
        	["name"=>"Jeep","productId"=>"1","active"=> true],
        	["name"=>"Kia","productId"=>"1","active"=> true],
        	["name"=>"Land Rover","productId"=>"1","active"=> true],
        	["name"=>"Lexus","productId"=>"1","active"=> true],
        	["name"=>"Lincoln","productId"=>"1","active"=> true],
        	["name"=>"MINI","productId"=>"1","active"=> true],
        	["name"=>"Mazda","productId"=>"1","active"=> true],
        	["name"=>"Mercedes Benz","productId"=>"1","active"=> true],
        	["name"=>"Mitsubishi","productId"=>"1","active"=> true],
        	["name"=>"Nissan","productId"=>"1","active"=> true],
        	["name"=>"Ram","productId"=>"1","active"=> true],
        	["name"=>"Scion","productId"=>"1","active"=> true],
        	["name"=>"Smart","productId"=>"1","active"=> true],
        	["name"=>"Subaru","productId"=>"1","active"=> true],
        	["name"=>"Suzuki","productId"=>"1","active"=> true],
        	["name"=>"Toyota","productId"=>"1","active"=> true],
        	["name"=>"Volkswagen","productId"=>"1","active"=> true],
        	["name"=>"Volvo","productId"=>"1","active"=> true]
        );
        foreach ($brands as $brand) {
        	App\models\Brand::create($brand);
        }
    }
}
