<?php

use Illuminate\Database\Seeder;

use App\models\Currency;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currency= array(
        	array(
        		"code"=> "AED",
        		"country"=> "United Arab Emirates",
        		"currency_name"=>"Dirhams"
        	),
        	array(
        		"code"=> "AFN",
        		"country"=> "Afghanistan",
        		"currency_name"=>"Afghanis"
        	),
        	array(
        		"code"=> "ALL",
        		"country"=> "Albania",
        		"currency_name"=>"Leke"
        	),
        	array(
        		"code"=> "AMD",
        		"country"=> "Armenia",
        		"currency_name"=>"Drams"
        	),
        	array(
        		"code"=> "ANG",
        		"country"=> "Netherlands Antilles",
        		"currency_name"=>"Guilders (also called Florins)"
        	),
        	array(
        		"code"=> "AOA",
        		"country"=> "Angola",
        		"currency_name"=>"Kwanza"
        	),
        	array(
        		"code"=> "ARS",
        		"country"=> "Argentina",
        		"currency_name"=>"Pesos"
        	),
        	array(
        		"code"=> "AUD",
        		"country"=> "Australia",
        		"currency_name"=>"Dollars"
        	),
        	array(
        		"code"=> "AWG",
        		"country"=> "Aruba",
        		"currency_name"=>"Guilders (also called Florins)"
        	),
        	array(
        		"code"=> "AZN",
        		"country"=> "Azerbaijan",
        		"currency_name"=>"New Manats"
        	),
        	array(
        		"code"=> "BAM",
        		"country"=> "Bosnia and Herzegovina",
        		"currency_name"=>"Convertible Marka"
        	),
        	array(
        		"code"=> "BBD",
        		"country"=> "Barbados",
        		"currency_name"=>"Dollars"
        	),
        	array(
        		"code"=> "BDT",
        		"country"=> "Bangladesh",
        		"currency_name"=>"Taka"
        	),
        	array(
        		"code"=> "BGN",
        		"country"=> "Bulgaria",
        		"currency_name"=>"Leva"
        	),
        	array(
        		"code"=> "BHD",
        		"country"=> "Bahrain",
        		"currency_name"=>"Dinars"
        	),
        	array(
        		"code"=> "BIF",
        		"country"=> "Burundi",
        		"currency_name"=>"Francs"
        	),
        	array(
        		"code"=> "BMD",
        		"country"=> "Bermuda",
        		"currency_name"=>"Dollars"
        	),
        	array(
        		"code"=> "BND",
        		"country"=> "Brunei Darussalam",
        		"currency_name"=>"Dollars"
        	),
        	array(
        		"code"=> "BOB",
        		"country"=> "Bolivia",
        		"currency_name"=>"Bolivianos"
        	),
        	array(
        		"code"=> "BRL",
        		"country"=> "Brazil",
        		"currency_name"=>"Brazil Real"
        	),
        	array(
        		"code"=> "BSD",
        		"country"=> "Bahamas",
        		"currency_name"=>"Dollars"
        	),
        	array(
        		"code"=> "BTN",
        		"country"=> "Bhutan",
        		"currency_name"=>"Ngultrum"
        	),
        	array(
        		"code"=> "BWP",
        		"country"=> "Botswana",
        		"currency_name"=>"Pulas"
        	),
        	array(
        		"code"=> "BYR",
        		"country"=> "Belarus",
        		"currency_name"=>"Rubles"
        	),
        	array(
        		"code"=> "BZD",
        		"country"=> "Belize",
        		"currency_name"=>"Dollars"
        	),
        	array(
        		"code"=> "CAD",
        		"country"=> "Canada",
        		"currency_name"=>"Dollars"
        	),
        	array(
        		"code"=> "CDF",
        		"country"=> "Congo/Kinshasa",
        		"currency_name"=>"Congolese Francs"
        	),
        	array(
        		"code"=> "CHF",
        		"country"=> "Switzerland",
        		"currency_name"=>"Francs"
        	),
        	array(
        		"code"=> "CLP",
        		"country"=> "Chile",
        		"currency_name"=>"Pesos"
        	),
        	array(
        		"code"=> "CNY",
        		"country"=> "China",
        		"currency_name"=>"Yuan Renminbi"
        	),
        	array(
        		"code"=> "COP",
        		"country"=> "Columbia",
        		"currency_name"=>"Pesos"
        	),
        	array(
        		"code"=> "CRC",
        		"country"=> "Costa Rica",
        		"currency_name"=>"Colones"
        	),
        	array(
        		"code"=> "CUP",
        		"country"=> "Cuba",
        		"currency_name"=>"Pesos"
        	),
        	array(
        		"code"=> "CVE",
        		"country"=> "Cape Verde",
        		"currency_name"=>"Escudos"
        	),
        	array(
        		"code"=> "CZK",
        		"country"=> "Czech Republic",
        		"currency_name"=>"Koruny"
        	),
        	array(
        		"code"=> "DJF",
        		"country"=> "Djibouti",
        		"currency_name"=>"Francs"
        	),
        	array(
        		"code"=> "DKK",
        		"country"=> "Denmark",
        		"currency_name"=>"Kroner"
        	),
        	array(
        		"code"=> "DOP",
        		"country"=> "Dominican Republic",
        		"currency_name"=>"Pesos"
        	),
        	array(
        		"code"=> "DZD",
        		"country"=> "Algeria",
        		"currency_name"=>"Algeria Dinars"
        	),
        	array(
        		"code"=> "EEK",
        		"country"=> "Estonia",
        		"currency_name"=>"Krooni"
        	),
        	array(
        		"code"=> "EGP",
        		"country"=> "Egypt",
        		"currency_name"=>"Pounds"
        	),
        	array(
        		"code"=> "ERN",
        		"country"=> "Eritrea",
        		"currency_name"=>"Nakfa"
        	),
        	array(
        		"code"=> "ETB",
        		"country"=> "Ethopia",
        		"currency_name"=>"Birr"
        	),
        	array(
        		"code"=> "EUR",
        		"country"=> "Euro Member Countries",
        		"currency_name"=>"Euro"
        	),
        	array(
        		"code"=> "FJD",
        		"country"=> "Fiji",
        		"currency_name"=>"Dollars"
        	),
        	array(
        		"code"=> "FKP",
        		"country"=> "Falkland Islands (Malvinas)",
        		"currency_name"=>"Pounds"
        	),
        	array(
        		"code"=> "GBP",
        		"country"=> "United Kingdom",
        		"currency_name"=>"Pounds"
        	),
        	array(
        		"code"=> "GEL",
        		"country"=> "Georgia",
        		"currency_name"=>"Lari"
        	),
        	array(
        		"code"=> "GGP",
        		"country"=> "Guernsey",
        		"currency_name"=>"Pounds"
        	),
        	array(
        		"code"=> "GHS",
        		"country"=> "Ghana",
        		"currency_name"=>"Cedis"
        	),
        	array(
        		"code"=> "GIP",
        		"country"=> "Gibraltar",
        		"currency_name"=>"Pounds"
        	),
        	array(
        		"code"=> "GMD",
        		"country"=> "Gambia",
        		"currency_name"=>"Dalasi"
        	),
        	array(
        		"code"=> "GNF",
        		"country"=> "Guinea",
        		"currency_name"=>"Francs"
        	),
        	array(
        		"code"=> "GTQ",
        		"country"=> "Guatemala",
        		"currency_name"=>"Quetzales"
        	),
        	array(
        		"code"=> "GYD",
        		"country"=> "Guyana",
        		"currency_name"=>"Dollars"
        	),
        	array(
        		"code"=> "HKD",
        		"country"=> "Hong Kong",
        		"currency_name"=>"Dollars"
        	),
        	array(
        		"code"=> "HNL",
        		"country"=> "Honduras",
        		"currency_name"=>"Lempiras"
        	),
        	array(
        		"code"=> "HRK",
        		"country"=> "Croatia",
        		"currency_name"=>"Kuna"
        	),
        	array(
        		"code"=> "HTG",
        		"country"=> "Haiti",
        		"currency_name"=>"Gourdes"
        	),
        	array(
        		"code"=> "HUF",
        		"country"=> "Hungary",
        		"currency_name"=>"Forint"
        	),
        	array(
        		"code"=> "IDR",
        		"country"=> "Indonesia",
        		"currency_name"=>"Rupiahs"
        	),
        	array(
        		"code"=> "ILS",
        		"country"=> "Israel",
        		"currency_name"=>"New Shekels"
        	),
        	array(
        		"code"=> "IMP",
        		"country"=> "Isle of Man",
        		"currency_name"=>"Pounds"
        	),
        	array(
        		"code"=> "INR",
        		"country"=> "India",
        		"currency_name"=>"Rupees"
        	),
        	array(
        		"code"=> "IQD",
        		"country"=> "Iraq",
        		"currency_name"=>"Dinars"
        	),
        	array(
        		"code"=> "IRR",
        		"country"=> "Iran",
        		"currency_name"=>"Rials"
        	),
        	array(
        		"code"=> "ISK",
        		"country"=> "Iceland",
        		"currency_name"=>"Kronur"
        	),
        	array(
        		"code"=> "JEP",
        		"country"=> "Jersey",
        		"currency_name"=>"Pounds"
        	),
        	array(
        		"code"=> "JMD",
        		"country"=> "Jamaica",
        		"currency_name"=>"Dollars"
        	),
        	array(
        		"code"=> "JOD",
        		"country"=> "Jordan",
        		"currency_name"=>"Dinars"
        	),
        	array(
        		"code"=> "JPY",
        		"country"=> "Japan",
        		"currency_name"=>"Yen"
        	),
        	array(
        		"code"=> "KES",
        		"country"=> "Kenya",
        		"currency_name"=>"Shillings"
        	),
        	array(
        		"code"=> "KGS",
        		"country"=> "Kyrgyzstan",
        		"currency_name"=>"Soms"
        	),
        	array(
        		"code"=> "KHR",
        		"country"=> "Cambodia",
        		"currency_name"=>"Riels"
        	),
        	array(
        		"code"=> "KMF",
        		"country"=> "Comoros",
        		"currency_name"=>"Francs"
        	),
        	array(
        		"code"=> "KPW",
        		"country"=> "Korea (North)",
        		"currency_name"=>"Won"
        	),
        	array(
        		"code"=> "KPW",
        		"country"=> "Korea (South)",
        		"currency_name"=>"Won"
        	),
        	array(
        		"code"=> "KWD",
        		"country"=> "Kuwait",
        		"currency_name"=>"Dinars"
        	),
        	array(
        		"code"=> "KYD",
        		"country"=> "Cayman Islands",
        		"currency_name"=>"Dollars"
        	),
        	array(
        		"code"=> "KZT",
        		"country"=> "Kazakhstan",
        		"currency_name"=>"Tenge"
        	),
        	array(
        		"code"=> "LAK",
        		"country"=> "Laos",
        		"currency_name"=>"Kips"
        	),
        	array(
        		"code"=> "LBP",
        		"country"=> "Lebanon",
        		"currency_name"=>"Pounds"
        	),
        	array(
        		"code"=> "LKR",
        		"country"=> "Sri Lanka",
        		"currency_name"=>"Rupees"
        	),
        	array(
        		"code"=> "LRD",
        		"country"=> "Liberia",
        		"currency_name"=>"Dollars"
        	),
        	array(
        		"code"=> "LSL",
        		"country"=> "Lesotho",
        		"currency_name"=>"Maloti"
        	),
        	array(
        		"code"=> "LTL",
        		"country"=> "Lithuania",
        		"currency_name"=>"Litai"
        	),
        	array(
        		"code"=> "LVL",
        		"country"=> "Latvia",
        		"currency_name"=>"Lati"
        	),
        	array(
        		"code"=> "LYD",
        		"country"=> "Libya",
        		"currency_name"=>"Dinars"
        	),
        	array(
        		"code"=> "MAD",
        		"country"=> "Morocco",
        		"currency_name"=>"Dirhams"
        	),
        	array(
        		"code"=> "MDL",
        		"country"=> "Moldova",
        		"currency_name"=>"Dei"
        	),
        	array(
        		"code"=> "MGA",
        		"country"=> "Madagascar",
        		"currency_name"=>"Ariary"
        	),
        	array(
        		"code"=> "MKD",
        		"country"=> "Macedonia",
        		"currency_name"=>"Denars"
        	),
        	array(
        		"code"=> "MMK",
        		"country"=> "Myanmar (Burma)",
        		"currency_name"=>"Kyats"
        	),
        	array(
        		"code"=> "MNT",
        		"country"=> "Mongolia",
        		"currency_name"=>"Tugriks"
        	),
        	array(
        		"code"=> "MOP",
        		"country"=> "Macau",
        		"currency_name"=>"Patacas"
        	),
        	array(
        		"code"=> "MRO",
        		"country"=> "Mauritania",
        		"currency_name"=>"Ouguiyas"
        	),
        	array(
        		"code"=> "MUR",
        		"country"=> "Mauritius",
        		"currency_name"=>"Rupees"
        	),
        	array(
        		"code"=> "MVR",
        		"country"=> "Maldives (Maldive Islands)",
        		"currency_name"=>"Rufiyaa"
        	),
        	array(
        		"code"=> "MWK",
        		"country"=> "Malawi",
        		"currency_name"=>"Kwachas"
        	),
        	array(
        		"code"=> "MXN",
        		"country"=> "Mexico",
        		"currency_name"=>"Pesos"
        	),
        	array(
        		"code"=> "MYR",
        		"country"=> "Malaysia",
        		"currency_name"=>"Ringgits"
        	),array(
        		"code"=> "MZN",
        		"country"=> "Mozambique",
        		"currency_name"=>"Meticais"
        	),
        	array(
        		"code"=> "NAD",
        		"country"=> "Namibia",
        		"currency_name"=>"Dollars"
        	),
        	array(
        		"code"=> "NGN",
        		"country"=> "Nigeria",
        		"currency_name"=>"Nairas"
        	),
        	array(
        		"code"=> "NIO",
        		"country"=> "Nicaragua",
        		"currency_name"=>"Cordobas"
        	),array(
        		"code"=> "NOK",
        		"country"=> "Norway",
        		"currency_name"=>"Krone"
        	),
        	array(
        		"code"=> "NPR",
        		"country"=> "Nepal",
        		"currency_name"=>"Nepal Rupees"
        	),
        	array(
        		"code"=> "",
        		"country"=> "",
        		"currency_name"=>""
        	),
        	array(
        		"code"=> "NZD",
        		"country"=> "New Zealand",
        		"currency_name"=>"Dollars"
        	),array(
        		"code"=> "OMR",
        		"country"=> "Oman",
        		"currency_name"=>"Rials"
        	),
        	array(
        		"code"=> "PAB",
        		"country"=> "Panama",
        		"currency_name"=>"Balboa"
        	),
        	array(
        		"code"=> "PEN",
        		"country"=> "Peru",
        		"currency_name"=>"Nuevos Soles"
        	),
        	array(
        		"code"=> "PGK",
        		"country"=> "Papua New Guinea",
        		"currency_name"=>"Kina"
        	),array(
        		"code"=> "PHP",
        		"country"=> "Philippines",
        		"currency_name"=>"Pesos"
        	),
        	array(
        		"code"=> "PKR",
        		"country"=> "Pakistan",
        		"currency_name"=>"Rupees"
        	),
        	array(
        		"code"=> "PLN",
        		"country"=> "Poland",
        		"currency_name"=>"Zlotych"
        	),
        	array(
        		"code"=> "PYG",
        		"country"=> "Paraguay",
        		"currency_name"=>"Guarani"
        	),array(
        		"code"=> "QAR",
        		"country"=> "Qatar",
        		"currency_name"=>"Rials"
        	),
        	array(
        		"code"=> "RON",
        		"country"=> "Romania",
        		"currency_name"=>"New Lei"
        	),
        	array(
        		"code"=> "RSD",
        		"country"=> "Serbia",
        		"currency_name"=>"Dinars"
        	),
        	array(
        		"code"=> "RUB",
        		"country"=> "Russia",
        		"currency_name"=>"Rubles"
        	),array(
        		"code"=> "RWF",
        		"country"=> "Rwanda",
        		"currency_name"=>"Rwanda Francs"
        	),
        	array(
        		"code"=> "SAR",
        		"country"=> "Saudi Arabia",
        		"currency_name"=>"Riyals"
        	),
        	array(
        		"code"=> "SBD",
        		"country"=> "Solomon Islands",
        		"currency_name"=>"Dollars"
        	),
        	array(
        		"code"=> "SCR",
        		"country"=> "Seychelles",
        		"currency_name"=>"Rupees"
        	),array(
        		"code"=> "SDG",
        		"country"=> "Sudan",
        		"currency_name"=>"Pounds"
        	),
        	array(
        		"code"=> "SEK",
        		"country"=> "Sweden",
        		"currency_name"=>"Kronor"
        	),
        	array(
        		"code"=> "SGD",
        		"country"=> "Singapore",
        		"currency_name"=>"Dollars"
        	),
        	array(
        		"code"=> "SHP",
        		"country"=> "Saint Helena",
        		"currency_name"=>"Pounds"
        	),
        	array(
        		"code"=> "SKK",
        		"country"=> "Slovakia",
        		"currency_name"=>"Koruny"
        	),
        	array(
        		"code"=> "SLL",
        		"country"=> "Sierra Leone",
        		"currency_name"=>"Leones"
        	),
        	array(
        		"code"=> "SOS",
        		"country"=> "Somalia",
        		"currency_name"=>"Shillings"
        	),
        	array(
        		"code"=> "SPL",
        		"country"=> "Seborga",
        		"currency_name"=>"Luigini"
        	),
        	array(
        		"code"=> "SRD",
        		"country"=> "Suriname",
        		"currency_name"=>"Dollars"
        	),
        	array(
        		"code"=> "STD",
        		"country"=> "São Tome and Principe",
        		"currency_name"=>"Dobras"
        	),
        	array(
        		"code"=> "SVC",
        		"country"=> "El Salvador",
        		"currency_name"=>"Colones"
        	),
        	array(
        		"code"=> "SYP",
        		"country"=> "Syria",
        		"currency_name"=>"Pounds"
        	),
        	array(
        		"code"=> "SZL",
        		"country"=> "Swaziland",
        		"currency_name"=>"Emalangeni"
        	),
        	array(
        		"code"=> "THB",
        		"country"=> "Thailand",
        		"currency_name"=>"Baht"
        	),
        	array(
        		"code"=> "TJS",
        		"country"=> "Tajikistan",
        		"currency_name"=>"Somoni"
        	),
        	array(
        		"code"=> "TMM",
        		"country"=> "Turkmenistan",
        		"currency_name"=>"Manats"
        	),
        	array(
        		"code"=> "TND",
        		"country"=> "Tunisia",
        		"currency_name"=>"Dinars"
        	),
        	array(
        		"code"=> "TOP",
        		"country"=> "Tonga",
        		"currency_name"=>"Pa'anga"
        	),
        	array(
        		"code"=> "TRY",
        		"country"=> "Turkey",
        		"currency_name"=>"New Lira"
        	),
        	array(
        		"code"=> "TTD",
        		"country"=> "Trinidad and Tobago",
        		"currency_name"=>"Dollars"
        	),
        	array(
        		"code"=> "TVD",
        		"country"=> "Tuvalu",
        		"currency_name"=>"Tuvalu Dollars"
        	),
        	array(
        		"code"=> "TWD",
        		"country"=> "Taiwan",
        		"currency_name"=>"New Dollars"
        	),
        	array(
        		"code"=> "TZS",
        		"country"=> "Tanzania",
        		"currency_name"=>"Shillings"
        	),
        	array(
        		"code"=> "UAH",
        		"country"=> "Ukraine",
        		"currency_name"=>"Hryvnia"
        	),
        	array(
        		"code"=> "UGX",
        		"country"=> "Uganda",
        		"currency_name"=>"Shillings"
        	),
        	array(
        		"code"=> "USD",
        		"country"=> "United States of America",
        		"currency_name"=>"Dollars"
        	),
        	array(
        		"code"=> "UYU",
        		"country"=> "Uruguay",
        		"currency_name"=>"Pesos"
        	),
        	array(
        		"code"=> "UZS",
        		"country"=> "Uzbekistan",
        		"currency_name"=>"Sums"
        	),
        	array(
        		"code"=> "VEF",
        		"country"=> "Venezuela",
        		"currency_name"=>"Bolivares Fuertes"
        	),
        	array(
        		"code"=> "VND",
        		"country"=> "Viet Nam",
        		"currency_name"=>"Dong"
        	),
        	array(
        		"code"=> "VUV",
        		"country"=> "Vanuatu",
        		"currency_name"=>"Vatu"
        	),
        	array(
        		"code"=> "WST",
        		"country"=> "Samoa",
        		"currency_name"=>"Tala"
        	),
        	array(
        		"code"=> "XAF",
        		"country"=> "Communauté Financière Africaine BEAC",
        		"currency_name"=>"Francs"
        	),
        	array(
        		"code"=> "XAG",
        		"country"=> "Silver",
        		"currency_name"=>"Ounces"
        	),
        	array(
        		"code"=> "XAU",
        		"country"=> "Gold",
        		"currency_name"=>"Ounces"
        	),
        	array(
        		"code"=> "XCD",
        		"country"=> "East Caribbean",
        		"currency_name"=>"Dollars"
        	),
        	array(
        		"code"=> "XDR",
        		"country"=> "International Monetary Fund (IMF)",
        		"currency_name"=>"Special Drawing Rights"
        	),
        	array(
        		"code"=> "XOF",
        		"country"=> "Communauté Financière Africaine BCEAO",
        		"currency_name"=>"Francs"
        	),
        	array(
        		"code"=> "XPD",
        		"country"=> "Palladium",
        		"currency_name"=>"Ounces"
        	),
        	array(
        		"code"=> "XPF",
        		"country"=> "Comptoirs Français du Pacifique",
        		"currency_name"=>"Francs"
        	),
        	array(
        		"code"=> "XPT",
        		"country"=> "Platinum",
        		"currency_name"=>"Ounces"
        	),
        	array(
        		"code"=> "YER",
        		"country"=> "Yemen",
        		"currency_name"=>"Rials"
        	),
        	array(
        		"code"=> "ZAR",
        		"country"=> "South Africa",
        		"currency_name"=>"Rand"
        	),
        	array(
        		"code"=> "ZMK",
        		"country"=> "Zambia",
        		"currency_name"=>"Kwacha"
        	),
        	array(
        		"code"=> "ZWD",
        		"country"=> "Zimbabwe",
        		"currency_name"=>"Zimbabwe Dollars"
        	)
        );
	
		foreach ($currency as $key => $value) {
			$cur= new App\models\Currency;

			$cur->code = $value['code'];
			$cur->country = $value['country'];
			$cur->currency_name = $value['currency_name'];
			$cur->save();
		}

    }
}
