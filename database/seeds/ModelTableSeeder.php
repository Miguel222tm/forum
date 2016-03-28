<?php

use Illuminate\Database\Seeder;

class ModelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chevrolet = array(
            "Black Diamond Avalanche", "Camaro", "Corvette", "Cruze", "Equinox", "Express Cargo Van", "Express Commercial Cutaway", "Express Passenger", "Impala", "Malibu", "Orlando", "Silverado 1500", "Silverado 2500HD", "Silverado 3500HD", "Sonic", "Spark", "Suburban", "Tahoe", "Traverse", "Trax", "Volt", "Corvette Stingray"
        );

        $chevroletBrandId = App\models\Brand::where('name', '=', 'Chevrolet')->first();
        foreach ($chevrolet as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $chevroletBrandId->brandId]);
        }


        $mercedes = array("AMG", "B250", "C250", "C300", "C350", "CL550", "CL600", "CLS550", "CLS63", "E300", "E350", "E550", "E63", "G550", "G63", "GL350", "GL450", "GL550", "GLK-Class", "GLK350", "ML350", "ML550", "ML63", "R350", "S350", "S400", "S550", "S600", "S63", "S65", "SL550", "SL63AMG", "SL65AMG", "SLK250", "SLK350", "SLK55", "SLS", "Sprinter Cargo Vans", "Sprinter Chassis-Cabs", "Sprinter Passenger Vans", "C63", "CL63", "CL65", "CLA250", "CLA45", "E250", "E400", "GL63 AMG", "GLK250", "SL63", "SL65", "SLS AMG", "SLS AMG Black Series");

        $mercedesBrandId = App\models\Brand::where('name', '=', 'Mercedes Benz')->first();
        foreach ($mercedes as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $mercedesBrandId->brandId]);
        }


        $volkswagen = array("Beetle Convertible", "Beetle Coupe", "CC", "Eos", "Golf", "Golf GTI", "Golf R", "Golf Wagon", "Jetta GLI", "Jetta Sedan", "Passat", "Tiguan", "Touareg");


        $volkswagenBrandId = App\models\Brand::where('name', '=', 'Volkswagen')->first();
        foreach ($volkswagen as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $volkswagenBrandId->brandId]);
        }
        /**
         * [$suzuki description]
         * @var array
         */
        $suzuki = array("Grand Vitara", "Kizashi", "SX4 Hatchback", "SX4 Sedan");

        $suzukiBrand = App\models\Brand::where('name', '=', 'Suzuki')->first();
        foreach ($suzuki as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $suzukiBrand->brandId]);
        }
        /**
         * [$smart description]
         * @var array
         */
        $smart = array("fortwo", "fortwo electric drive");
        $smartBrand = App\models\Brand::where('name', '=', 'Smart')->first();
        foreach ($smart as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $smartBrand->brandId]);
        }
        /**
         * [$dodge description]
         * @var array
         */
        $dodge = array("Avenger", "Challenger", "Charger", "Dart", "Durango", "Grand Caravan", "Journey", "SRT Viper");
        $dodgeBrand = App\models\Brand::where('name', '=', 'Dodge')->first();
        foreach ($dodge as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $dodgeBrand->brandId]);
        }

        /**
         * [$scion description]
         * @var array
         */
        $scion = array("FR-S", "iQ", "tC", "xB", "xD");
        $scionBrand = App\models\Brand::where('name', '=', 'Scion')->first();
        foreach ($scion as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $scionBrand->brandId]);
        }

        /**
         * [$cadillac description]
         * @var array
         */
        $cadillac = array("ATS", "CTS Coupe", "CTS Sedan", "CTS Wagon", "Escalade", "Escalade ESV", "Escalade EXT", "SRX", "V-Series", "XTS", "CTS-V Wagon", "ELR");
        $cadillacBrand = App\models\Brand::where('name', '=', 'Cadillac')->first();
        foreach ($cadillac as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $cadillacBrand->brandId]);
        }
        /**
         * [$Honda description]
         * @var array
         */
        $honda = array("Accord Coupe", "Accord Crosstour", "Accord Sedan", "CR-V", "CR-Z", "Civic Coupe", "Civic Sedan", "Fit", "Odyssey", "Pilot", "Ridgeline", "Accord", "Civic Hybrid");
        $hondaBrand = App\models\Brand::where('name', '=', 'Honda')->first();
        foreach ($honda as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $hondaBrand->brandId]);
        }
        /**
         * [$hyundai description]
         * @var array
         */
        $hyundai = array("Accent", "Elantra", "Elantra Coupe", "Elantra GT", "Equus", "Genesis Coupe", "Genesis Sedan", "Santa Fe", "Sonata", "Sonata Hybrid", "Tucson", "Veloster", "Santa Fe Sport");
        $hyundaiBrand = App\models\Brand::where('name', '=', 'Hyundai')->first();
        foreach ($hyundai as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $hyundaiBrand->brandId]);
        }

        /**
         * [$ford description]
         * @var array
         */
        $ford = array("C-Max Energi", "C-Max Hybrid", "Econoline Cargo Van", "Econoline Commercial Chassis", "Econoline Commercial Cutaway", "Econoline Wagon", "Edge", "Escape", "Expedition", "Expedition Max", "Explorer", "F-150", "Fiesta", "Flex", "Focus", "Focus Electric", "Fusion", "Fusion Hybrid", "Fusion Plug-In Hybrid", "Mustang", "Super Duty F-250 SRW", "Super Duty F-350 DRW", "Super Duty F-350 SRW", "Super Duty F-450 DRW", "Super Duty F-53 Motorhome", "Super Duty F-550 DRW", "Super Duty F-59 Stripped Chassis", "Taurus", "Transit Connect", "Transit Connect Wagon", "Fusion Energi", "Transit Cargo Van", "Transit Chassis Cab", "Transit Cutaway", "Transit Wagon");
        $fordBrand = App\models\Brand::where('name', '=', 'Ford')->first();
        foreach ($ford as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $fordBrand->brandId]);
        }
        /**
         * [$mazda description]
         * @var array
         */
        $mazda = array("CX-9", "MX-5", "Mazda2", "Mazda3", "Mazda5", "Mazda6", "CX-5");
        $mazdaBrand = App\models\Brand::where('name', '=', 'Mazda')->first();
        foreach ($mazda as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $mazdaBrand->brandId]);
        }
        /**
         * [$jeep description]
         * @var array
         */
        $jeep = array("Compass", "Grand Cherokee", "Patriot", "Wrangler", "Wrangler Unlimited", "Cherokee");
        $jeepBrand = App\models\Brand::where('name', '=', 'Jeep')->first();
        foreach ($jeep as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $jeepBrand->brandId]);
        }
        /**
         * [$infiniti description]
         * @var array
         */
        $infiniti = array("Q50", "Q60 Convertible", "Q60 Coupe", "Q70", "QX50", "QX60", "QX70", "QX80");
        $infinitiBrand = App\models\Brand::where('name', '=', 'Infiniti')->first();
        foreach ($infiniti as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $infinitiBrand->brandId]);
        }
        /**
         * [$landRover description]
         * @var array
         */
        $landRover = array("LR2", "LR4", "Range Rover", "Range Rover Evoque", "Range Rover Sport");
        $landRoverBrand = App\models\Brand::where('name', '=', 'Land Rover')->first();
        foreach ($landRover as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $landRoverBrand->brandId]);
        }
        /**
         * [$kia description]
         * @var array
         */
        $kia = array("Forte", "Forte 5-Door", "Forte Koup", "Optima", "Optima Hybrid", "Rio", "Sorento", "Soul", "Sportage", "Cadenza", "Rondo", "Sedona", "K900");
        $kiaBrand = App\models\Brand::where('name', '=', 'Kia')->first();
        foreach ($kia as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $kiaBrand->brandId]);
        }
        /**
         * [$mitsubishi description]
         * @var array
         */
        $mitsubishi = array("Lancer", "Lancer Evolution", "Lancer Sportback", "Outlander", "RVR", "i-MiEV", "Mirage");
        $mitsubishiBrand = App\models\Brand::where('name', '=', 'Mitsubishi')->first();
        foreach ($mitsubishi as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $mitsubishiBrand->brandId]);
        }
        /**
         * [$bmw description]
         * @var array
         */
        $bmw = array("128i", "135i", "320i", "320i xDrive", "328i", "328i xDrive", "328i xDrive Classic Line", "335i", "335i xDrive", "335is", "528i", "528i xDrive", "535i xDrive", "535i xDrive Gran Turismo", "550i xDrive", "550i xDrive Gran Turismo", "650i xDrive", "650i xDrive Gran Coupe", "740Li xDrive", "750Li xDrive", "750i xDrive", "760Li", "ALPINA B7 LWB xDrive", "ALPINA B7 xDrive", "ActiveHybrid 3", "ActiveHybrid 5", "ActiveHybrid 7 L", "M Models", "X1 xDrive28i", "X1 xDrive35i", "X3 xDrive28i", "X3 xDrive35i", "X5 xDrive35d", "X5 xDrive35i", "X5 xDrive50i", "X6 xDrive35i", "X6 xDrive50i", "Z4 sDrive28i", "Z4 sDrive35i", "Z4 sDrive35is", "228i", "328d xDrive", "328i xDrive Gran Turismo", "335i xDrive Gran Turismo", "428i", "428i xDrive", "435i", "435i xDrive", "535d xDrive", "640i xDrive Gran Coupe", "M235i", "Z4 28i", "Z4 35i", "Z4 35is", "i3", "X3 xDrive28d");
        $bmwBrand = App\models\Brand::where('name', '=', 'BMW')->first();
        foreach ($bmw as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $bmwBrand->brandId]);
        }
        /**
         * [$mini description]
         * @var array
         */
        $mini = array("Cooper Clubman", "Cooper Convertible", "Cooper Countryman", "Cooper Coupe", "Cooper Hardtop", "Cooper Paceman", "Cooper Roadster", "Cooper Clubvan");
        $miniBrand = App\models\Brand::where('name', '=', 'MINI')->first();
        foreach ($mini as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $miniBrand->brandId]);
        }
        /**
         * [$lincon description]
         * @var array
         */
        $lincon = array("MKS", "MKT", "MKX", "MKZ", "Navigator", "Navigator L", "MKC");
        $linconBrand = App\models\Brand::where('name', '=', 'Lincoln')->first();
        foreach ($lincon as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $linconBrand->brandId]);
        }
        /**
         * [$acura description]
         * @var array
         */
        $acura = array("ILX", "MDX", "RDX", "TL", "TSX", "ZDX", "RLX");
        $acuraBrand = App\models\Brand::where('name', '=', 'Acura')->first();
        foreach ($acura as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $acuraBrand->brandId]);
        }
        /**
         * [$jaguar description]
         * @var array
         */
        $jaguar = array("XF", "XJ", "XK", "F-TYPE");
        $jaguarBrand = App\models\Brand::where('name', '=', 'Jaguar')->first();
        foreach ($jaguar as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $jaguarBrand->brandId]);
        }
        /**
         * [$gmc description]
         * @var array
         */
        $gmc = array("Acadia", "Savana Cargo Van", "Savana Commercial Cutaway", "Savana Passenger", "Sierra 1500", "Sierra 2500HD", "Sierra 3500HD", "Terrain", "Yukon", "Yukon XL");
        $gmcBrand = App\models\Brand::where('name', '=', 'GMC')->first();
        foreach ($gmc as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $gmcBrand->brandId]);
        }
        /**
         * [$nissan description]
         * @var array
         */
        $nissan = array("370Z", "Altima", "Armada", "Frontier", "GT-R", "JUKE", "LEAF", "Maxima", "Murano", "NV", "NV200", "NVP", "Pathfinder", "Rogue", "Sentra", "Titan", "Versa", "Versa Note", "Xterra", "Micra");
        $nissanBrand = App\models\Brand::where('name', '=', 'Nissan')->first();
        foreach ($nissan as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $nissanBrand->brandId]);
        }
        /**
         * [$toyota description]
         * @var array
         */
        $toyota = array("4Runner", "Avalon", "Camry", "Camry Hybrid", "Corolla", "FJ Cruiser", "Highlander", "Highlander Hybrid", "Matrix", "Prius", "Prius Plug-In", "Prius c", "Prius v", "RAV4", "Sequoia", "Sienna", "Tacoma", "Tundra", "Venza", "Yaris");
        $toyotaBrand = App\models\Brand::where('name', '=', 'Toyota')->first();
        foreach ($toyota as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $toyotaBrand->brandId]);
        }
        /**
         * [$volvo description]
         * @var array
         */
        $volvo = array("C30", "C70", "S60", "S80", "XC60", "XC70", "XC90", "V60");
        $volvoBrand = App\models\Brand::where('name', '=', 'Volvo')->first();
        foreach ($volvo as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $volvoBrand->brandId]);
        }
        /**
         * [$chrysler description]
         * @var array
         */
        $chrysler = array("200", "300", "Town & Country");
        $chryslerBrand = App\models\Brand::where('name', '=', 'Chrysler')->first();
        foreach ($chrysler as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $chryslerBrand->brandId]);
        }
        /**
         * [$fiat description]
         * @var array
         */
        $fiat = array("500", "500c", "500L");
        $fiatBrand = App\models\Brand::where('name', '=', 'FIAT')->first();
        foreach ($fiat as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $fiatBrand->brandId]);
        }
        /**
         * [$ram description]
         * @var array
         */
        $ram = array("1500", "2500", "3500", "4500", "5500", "Cargo Van", "ProMaster");
        $ramBrand = App\models\Brand::where('name', '=', 'Ram')->first();
        foreach ($ram as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $ramBrand->brandId]);
        }
        /**
         * [$subaru description]
         * @var array
         */
        $subaru = array("BRZ", "Forester", "Impreza", "Legacy", "Outback", "Tribeca", "WRX", "XV Crosstrek", "XV Crosstrek Hybrid");
        $subaruBrand = App\models\Brand::where('name', '=', 'Subaru')->first();
        foreach ($subaru as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $subaruBrand->brandId]);
        }
        /**
         * [$buick description]
         * @var array
         */
        $buick = array("Enclave", "Encore", "LaCrosse", "Regal", "Verano");
        $buickBrand = App\models\Brand::where('name', '=', 'Buick')->first();
        foreach ($buick as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $buickBrand->brandId]);
        }
        /**
         * [$lexus description]
         * @var array
         */
        $lexus = array("CT 200h", "ES 300h", "ES 350", "GS 350", "GS 450h", "GX 460", "IS 250", "IS 250C", "IS 350", "IS 350C", "IS F", "LS 460", "LS 600h L", "LX 570", "RX 350", "RX 450h");
        $lexusBrand = App\models\Brand::where('name', '=', 'Lexus')->first();
        foreach ($lexus as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $lexusBrand->brandId]);
        }
        /**
         * [$audi description]
         * @var array
         */
        $audi = array("A3", "A4", "A5", "A6", "A7", "A8", "A8 L", "Q5", "Q7", "RS5", "S4", "S5", "S6", "S7", "S8", "TT", "TT RS", "TTS", "allroad", "R8", "RS 5", "RS 7", "S5 Cabriolet", "S5 Coupe", "SQ5");
        $audiBrand = App\models\Brand::where('name', '=', 'Audi')->first();
        foreach ($audi as $value) {
            App\models\Modelo::create(['name'=> $value, 'active'=> true, 'brandId'=> $audiBrand->brandId]);
        }




    }
}
