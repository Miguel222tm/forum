<?php

use Illuminate\Database\Seeder;
use App\models\Locations;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations= array(
        	"1"=> array(
        		"code"=>"af",
        		"description"=>"Africa"
        	),
        	"2"=> array(
        		"code"=>"af.dz",
        		"description"=>"Algeria"
        	),
        	"3"=> array(
        		"code"=>"af.cm",
        		"description"=>"Cameroon"
        	),
        	"4"=> array(
        		"code"=>"af.eg",
        		"description"=>"Egypt"
        	),
        	"5"=> array(
        		"code"=>"af.gh",
        		"description"=>"Ghana"
        	),
        	"6"=> array(
        		"code"=>"af.ke",
        		"description"=>"Kenya"
        	),
        	"7"=> array(
        		"code"=>"af.ma",
        		"description"=>"Morocco"
        	),
        	"8"=> array(
        		"code"=>"af.ng",
        		"description"=>"Nigeria"
        	),
        	"9"=> array(
        		"code"=>"af.za",
        		"description"=>"South Africa"
        	),
        	"10"=> array(
        		"code"=>"af.za.*.5852",
        		"description"=>"Cape Town Area, South Africa"
        	),
        	"11"=> array(
        		"code"=>"af.za.*.5855",
        		"description"=>"Durban Area, South Africa"
        	),
        	"12"=> array(
        		"code"=>"af.za.*.5862",
        		"description"=>"Johannesburg Area, South Africa"
        	),
        	"13"=> array(
        		"code"=>"af.tz",
        		"description"=>"Tanzania"
        	),
        	"14"=> array(
        		"code"=>"af.tn",
        		"description"=>"Tunisia"
        	),
        	"15"=> array(
        		"code"=>"af.ug",
        		"description"=>"Uganda"
        	),
        	"16"=> array(
        		"code"=>"af.zw",
        		"description"=>"Zimbabwe"
        	),
        	"17"=> array(
        		"code"=>"aq",
        		"description"=>"Antarctica"
        	),
        	"18"=> array(
        		"code"=>"as",
        		"description"=>"Asia"
        	),
        	"19"=> array(
        		"code"=>"as.bd",
        		"description"=>"Bangladesh"
        	),
        	"20"=> array(
        		"code"=>"as.cn",
        		"description"=>"China"
        	),
        	"21"=> array(
        		"code"=>"as.cn.*.8911",
        		"description"=>"Beijing City, China"
        	),
        	"22"=> array(
        		"code"=>"as.cn.*.8919",
        		"description"=>"Guangzhou, Guangdong, China"
        	),
        	"23"=> array(
        		"code"=>"as.cn.*.8909",
        		"description"=>"Shanghai City, China"
        	),
        	"24"=> array(
        		"code"=>"as.cn.*.8910",
        		"description"=>"Shenzhen, Guangdong, China"
        	),
        	"25"=> array(
        		"code"=>"as.hk",
        		"description"=>"Hong Kong"
        	),
        	"26"=> array(
        		"code"=>"as.in",
        		"description"=>"India"
        	),
        	"27"=> array(
        		"code"=>"as.in.an",
        		"description"=>"Andaman & Nicobar Islands"
        	),
        	"28"=> array(
        		"code"=>"as.in.ap",
        		"description"=>"Andhra Pradesh"
        	),
        	"29"=> array(
        		"code"=>"as.in.ap.6508",
        		"description"=>"Hyderabad Area, India"
        	),
        	"30"=> array(
        		"code"=>"as.in.ar",
        		"description"=>"Arunachal Pradesh"
        	),
        	"31"=> array(
        		"code"=>"as.in.as",
        		"description"=>"Assam"
        	),
        	"32"=> array(
        		"code"=>"as.in.br",
        		"description"=>"Bihar"
        	),
        	"33"=> array(
        		"code"=>"as.in.ch",
        		"description"=>"Chandigarh"
        	),
        	"34"=> array(
        		"code"=>"as.in.cg",
        		"description"=>"Chattisgarh"
        	),
        	"35"=> array(
        		"code"=>"as.in.dn",
        		"description"=>"Dadra& Nagar Haveli"
        	),
        	"36"=> array(
        		"code"=>"as.in.dd",
        		"description"=>"Daman & Diu"
        	),
        	"37"=> array(
        		"code"=>"as.in.dl",
        		"description"=>"Delhi"
        	),
        	"38"=> array(
        		"code"=>"as.in.ga",
        		"description"=>"Goa"
        	),
        	"39"=> array(
        		"code"=>"as.in.gj",
        		"description"=>"Gujarat"
        	),
        	"40"=> array(
        		"code"=>"as.in.gj.7065",
        		"description"=>"Ahmedabad Area, India"
        	),
        	"41"=> array(
        		"code"=>"as.in.gj.6552",
        		"description"=>"Vadodara Area, India"
        	),
        	"42"=> array(
        		"code"=>"as.in.hr",
        		"description"=>"Haryana"
        	),
        	"43"=> array(
        		"code"=>"as.in.hr.7391",
        		"description"=>"Gurgaon, India"
        	),
        	"44"=> array(
        		"code"=>"as.in.hr.7151",
        		"description"=>"New Delhi Area, India"
        	),
        	"45"=> array(
        		"code"=>"as.in.hp",
        		"description"=>"Himachal Pradesh"
        	),
        	"46"=> array(
        		"code"=>"as.in.jk",
        		"description"=>"Jammu & Kashmir"
        	),
        	"47"=> array(
        		"code"=>"as.in.jh",
        		"description"=>"Jharkhand"
        	),
        	"48"=> array(
        		"code"=>"as.in.ka",
        		"description"=>"Karnataka"
        	),
        	"49"=> array(
        		"code"=>"as.in.ka.7127",
        		"description"=>"Bengaluru Area, India"
        	),
        	"50"=> array(
        		"code"=>"as.in.kl",
        		"description"=>"Kerala"
        	),
        	"51"=> array(
        		"code"=>"as.in.kl.6477",
        		"description"=>"Cochin Area, India"
        	),
        	"52"=> array(
        		"code"=>"as.in.ld",
        		"description"=>"Lakshadweep"
        	),
        	"53"=> array(
        		"code"=>"as.in.mp",
        		"description"=>"Madhya Pradesh"
        	),
        	"54"=> array(
        		"code"=>"as.in.mp.7382",
        		"description"=>"Indore Area, India"
        	),
        	"55"=> array(
        		"code"=>"as.in.mh",
        		"description"=>"Maharashtra"
        	),
        	"56"=> array(
        		"code"=>"as.in.mh.7150",
        		"description"=>"Mumbai Area, India"
        	),
        	"57"=> array(
        		"code"=>"as.in.mh.6751",
        		"description"=>"Nagpur Area, India"
        	),
        	"58"=> array(
        		"code"=>"as.in.mh.7350",
        		"description"=>"Pune Area, India"
        	),
        	"59"=> array(
        		"code"=>"as.in.mn",
        		"description"=>"Manipur"
        	),
        	"60"=> array(
        		"code"=>"as.in.ml",
        		"description"=>"Meghalaya"
        	),
        	"61"=> array(
        		"code"=>"as.in.mz",
        		"description"=>"Mizoram"
        	),
        	"62"=> array(
        		"code"=>"as.in.nl",
        		"description"=>"Nagaland"
        	),
        	"63"=> array(
        		"code"=>"as.in.or",
        		"description"=>"Orissa"
        	),
        	"64"=> array(
        		"code"=>"as.in.py",
        		"description"=>"Pondicherry"
        	),
        	"65"=> array(
        		"code"=>"as.in.pb",
        		"description"=>"Punjab"
        	),
        	"66"=> array(
        		"code"=>"as.in.pb.6879",
        		"description"=>"Chandigarh Area, India"
        	),
        	"67"=> array(
        		"code"=>"as.in.rj",
        		"description"=>"Rajasthan"
        	),
        	"67"=> array(
        		"code"=>"as.in.rj.7287",
        		"description"=>"Jaipur Area, India"
        	),
        	"68"=> array(
        		"code"=>"as.in.sk",
        		"description"=>"Sikkim"
        	),
        	"69"=> array(
        		"code"=>"as.in.tn",
        		"description"=>"Tamil Nadu"
        	),
        	"70"=> array(
        		"code"=>"as.in.tn.6891",
        		"description"=>"Chennai Area, India"
        	),
        	"71"=> array(
        		"code"=>"as.in.tn.6472",
        		"description"=>"Coimbatore Area, India"
        	),
        	"72"=> array(
        		"code"=>"as.in.tr",
        		"description"=>"Tripura"
        	),
        	"73"=> array(
        		"code"=>"as.in.up",
        		"description"=>"Uttar Pradesh"
        	),
        	"74"=> array(
        		"code"=>"as.in.up.7093",
        		"description"=>"Lucknow Area, India"
        	),
        	"75"=> array(
        		"code"=>"as.in.up.7392",
        		"description"=>"Noida Area, India"
        	),
        	"76"=> array(
        		"code"=>"as.in.ul",
        		"description"=>"Uttarakhand"
        	),
        	"77"=> array(
        		"code"=>"as.in.wb",
        		"description"=>"West Bengal"
        	),
        	"78"=> array(
        		"code"=>"as.in.wb.7003",
        		"description"=>"Kolkata Area, India"
        	),
        	"79"=> array(
        		"code"=>"as.id",
        		"description"=>"Indonesia"
        	),
        	"80"=> array(
        		"code"=>"as.id.*.8594",
        		"description"=>"Greater Jakarta Area, Indonesia"
        	),
        	"81"=> array(
        		"code"=>"as.jp",
        		"description"=>"Japan"
        	),
        	"82"=> array(
        		"code"=>"as.kr",
        		"description"=>"Korea"
        	),
        	"83"=> array(
        		"code"=>"as.kr.*.7700",
        		"description"=>"Gangnam-gu, Seoul, Korea"
        	),
        	"84"=> array(
        		"code"=>"as.my",
        		"description"=>"Malaysia"
        	),
        	"85"=> array(
        		"code"=>"as.my.*.7960",
        		"description"=>"Kuala Lumpur, Malaysia"
        	),
        	"86"=> array(
        		"code"=>"as.my.*.7945",
        		"description"=>"Selangor, Malaysia"
        	),
        	"87"=> array(
        		"code"=>"as.np",
        		"description"=>"Nepal"
        	),
        	"88"=> array(
        		"code"=>"as.ph",
        		"description"=>"Philippines"
        	),
        	"89"=> array(
        		"code"=>"as.sg",
        		"description"=>"Singapore"
        	),
        	"90"=> array(
        		"code"=>"as.lk",
        		"description"=>"Sri Lanka"
        	),
        	"91"=> array(
        		"code"=>"as.tw",
        		"description"=>"Taiwan"
        	),
        	"92"=> array(
        		"code"=>"as.th",
        		"description"=>"Thailand"
        	),
        	"93"=> array(
        		"code"=>"as.vn",
        		"description"=>"Vietnam"
        	),
        	"94"=> array(
        		"code"=>"eu",
        		"description"=>"Europe"
        	),
        	"95"=> array(
        		"code"=>"eu.at",
        		"description"=>"Austria"
        	),
        	"96"=> array(
        		"code"=>"eu.be",
        		"description"=>"Belgium"
        	),
        	"97"=> array(
        		"code"=>"eu.be.*.4918",
        		"description"=>"Antwerp Area, Belgium"
        	),
        	"98"=> array(
        		"code"=>"eu.be.*.4920",
        		"description"=>"Brussels Area, Belgium"
        	),
        	"99"=> array(
        		"code"=>"eu.bg",
        		"description"=>"Bulgaria"
        	),
        	"100"=> array(
        		"code"=>"eu.hr",
        		"description"=>"Croatia"
        	),
        	"101"=> array(
        		"code"=>"eu.cz",
        		"description"=>"Czech Republic"
        	),
        	"102"=> array(
        		"code"=>"eu.dk",
        		"description"=>"Denmark"
        	),
        	"103"=> array(
        		"code"=>"eu.dk.*.5038",
        		"description"=>"Copenhagen Area, Denmark"
        	),
        	"104"=> array(
        		"code"=>"eu.dk.*.5041",
        		"description"=>"Odense Area, Denmark"
        	),
        	"105"=> array(
        		"code"=>"eu.dk.*.5044",
        		"description"=>"Ålborg Area, Denmark"
        	),
        	"106"=> array(
        		"code"=>"eu.dk.*.5045",
        		"description"=>"Århus Area, Denmark"
        	),
        	"107"=> array(
        		"code"=>"eu.fi",
        		"description"=>"Finland"
        	),
        	"108"=> array(
        		"code"=>"eu.fr",
        		"description"=>"France"
        	),
        	"109"=> array(
        		"code"=>"eu.fr.*.5205",
        		"description"=>"Lille Area, France"
        	),
        	"110"=> array(
        		"code"=>"eu.fr.*.5210",
        		"description"=>"Lyon Area, France"
        	),
        	"111"=> array(
        		"code"=>"eu.fr.*.5211",
        		"description"=>"Marseille Area, France"
        	),
        	"112"=> array(
        		"code"=>"eu.fr.*.5221",
        		"description"=>"Nice Area, France"
        	),
        	"113"=> array(
        		"code"=>"eu.fr.*.5227",
        		"description"=>"Paris Area, France"
        	),
        	"114"=> array(
        		"code"=>"eu.fr.*.5249",
        		"description"=>"Toulouse Area, France"
        	),
        	"115"=> array(
        		"code"=>"eu.de",
        		"description"=>"Germany"
        	),
        	"116"=> array(
        		"code"=>"eu.de.*.4953",
        		"description"=>"Cologne Area, Germany"
        	),
        	"117"=> array(
        		"code"=>"eu.de.*.4966",
        		"description"=>"Frankfurt Am Main Area, Germany"
        	),
        	"118"=> array(
        		"code"=>"eu.de.*.5000",
        		"description"=>"Munich Area, Germany"
        	),
        	"119"=> array(
        		"code"=>"eu.gr",
        		"description"=>"Greece"
        	),
        	"120"=> array(
        		"code"=>"eu.hu",
        		"description"=>"Hungary"
        	),
        	"121"=> array(
        		"code"=>"eu.ie",
        		"description"=>"Ireland"
        	),
        	"122"=> array(
        		"code"=>"eu.it",
        		"description"=>"Italy"
        	),
        	"123"=> array(
        		"code"=>"eu.it.*.5587",
        		"description"=>"Bologna Area, Italy"
        	),
        	"124"=> array(
        		"code"=>"eu.it.*.5616",
        		"description"=>"Milan Area, Italy"
        	),
        	"125"=> array(
        		"code"=>"eu.it.*.5636",
        		"description"=>"Rome Area, Italy"
        	),
        	"126"=> array(
        		"code"=>"eu.it.*.5652",
        		"description"=>"Turin Area, Italy"
        	),
        	"127"=> array(
        		"code"=>"eu.it.*.5657",
        		"description"=>"Venice Area, Italy"
        	),
        	"128"=> array(
        		"code"=>"eu.lt",
        		"description"=>"Lithuania"
        	),
        	"129"=> array(
        		"code"=>"eu.nl",
        		"description"=>"Netherlands"
        	),
        	"130"=> array(
        		"code"=>"eu.nl.*.5663",
        		"description"=>"Almere Stad Area, Netherlands"
        	),
        	"131"=> array(
        		"code"=>"eu.nl.*.5664",
        		"description"=>"Amsterdam Area, Netherlands"
        	),
        	"132"=> array(
        		"code"=>"eu.nl.*.5665",
        		"description"=>"Apeldoorn Area, Netherlands"
        	),
        	"133"=> array(
        		"code"=>"eu.nl.*.5906",
        		"description"=>"Breda Area, Netherlands"
        	),
        	"134"=> array(
        		"code"=>"eu.nl.*.5668",
        		"description"=>"Eindhoven Area, Netherlands"
        	),
        	"135"=> array(
        		"code"=>"eu.nl.*.5669",
        		"description"=>"Enschede Area, Netherlands"
        	),
        	"136"=> array(
        		"code"=>"eu.nl.*.5673",
        		"description"=>"Groningen Area, Netherlands"
        	),
        	"137"=> array(
        		"code"=>"eu.nl.*.5681",
        		"description"=>"Nijmegen Area, Netherlands"
        	),
        	"138"=> array(
        		"code"=>"eu.nl.*.5908",
        		"description"=>"Rotterdam Area, Netherlands"
        	),
        	"139"=> array(
        		"code"=>"eu.nl.*.5688",
        		"description"=>"The Hague Area, Netherlands"
        	),
        	"140"=> array(
        		"code"=>"eu.nl.*.5907",
        		"description"=>"Tilburg Area, Netherlands"
        	),
        	"141"=> array(
        		"code"=>"eu.nl.*.5690",
        		"description"=>"Utrecht Area, Netherlands"
        	),
        	"142"=> array(
        		"code"=>"eu.no",
        		"description"=>"Norway"
        	),
        	"143"=> array(
        		"code"=>"eu.no.*.5712",
        		"description"=>"Oslo Area, Norway"
        	),
        	"144"=> array(
        		"code"=>"eu.pl",
        		"description"=>"Poland"
        	),
        	"145"=> array(
        		"code"=>"eu.pt",
        		"description"=>"Portugal"
        	),
        	"146"=> array(
        		"code"=>"eu.pt.*.7405",
        		"description"=>"Lisbon Area, Portugal"
        	),
        	"147"=> array(
        		"code"=>"eu.pt.*.7397",
        		"description"=>"Porto Area, Portugal"
        	),
        	"148"=> array(
        		"code"=>"eu.ro",
        		"description"=>"Romania"
        	),
        	"149"=> array(
        		"code"=>"eu.ru",
        		"description"=>"Russian Federation"
        	),
        	"150"=> array(
        		"code"=>"eu.rs",
        		"description"=>"Serbia"
        	),
        	"151"=> array(
        		"code"=>"eu.sk",
        		"description"=>"Slovak Republic"
        	),
        	"152"=> array(
        		"code"=>"eu.es",
        		"description"=>"Spain"
        	),
        	"153"=> array(
        		"code"=>"eu.es.*.5064",
        		"description"=>"Barcelona Area, Spain"
        	),
        	"154"=> array(
        		"code"=>"eu.es.*.5113",
        		"description"=>"Madrid Area, Spain"
        	),
        	"155"=> array(
        		"code"=>"eu.se",
        		"description"=>"Sweden"
        	),
        	"156"=> array(
        		"code"=>"eu.ch",
        		"description"=>"Switzerland"
        	),
        	"157"=> array(
        		"code"=>"eu.ch.*.4930",
        		"description"=>"Geneva Area, Switzerland"
        	),
        	"158"=> array(
        		"code"=>"eu.ch.*.4938",
        		"description"=>"Zürich Area, Switzerland"
        	),
        	"159"=> array(
        		"code"=>"eu.tr",
        		"description"=>"Turkey"
        	),
        	"160"=> array(
        		"code"=>"eu.tr.*.7585",
        		"description"=>"Istanbul, Turkey"
        	),
        	"161"=> array(
        		"code"=>"eu.ua",
        		"description"=>"Ukraine"
        	),
        	"162"=> array(
        		"code"=>"eu.gb",
        		"description"=>"United Kingdom"
        	),
        	"163"=> array(
        		"code"=>"eu.gb.*.4544",
        		"description"=>"Birmingham, United Kingdom"
        	),
        	"164"=> array(
        		"code"=>"eu.gb.*.4550",
        		"description"=>"Brighton, United Kingdom"
        	),
        	"165"=> array(
        		"code"=>"eu.gb.*.4552",
        		"description"=>"Bristol, United Kingdom"
        	),
        	"166"=> array(
        		"code"=>"eu.gb.*.4555",
        		"description"=>"Cambridge, United Kingdom"
        	),
        	"167"=> array(
        		"code"=>"eu.gb.*.4558",
        		"description"=>"Chelmsford, United Kingdom"
        	),
        	"168"=> array(
        		"code"=>"eu.gb.*.4562",
        		"description"=>"Coventry, United Kingdom"
        	),
        	"169"=> array(
        		"code"=>"eu.gb.*.4574",
        		"description"=>"Edinburgh, United Kingdom"
        	),
        	"170"=> array(
        		"code"=>"eu.gb.*.4579",
        		"description"=>"Glasgow, United Kingdom"
        	),
        	"171"=> array(
        		"code"=>"eu.gb.*.4580",
        		"description"=>"Gloucester, United Kingdom"
        	),
        	"172"=> array(
        		"code"=>"eu.gb.*.4582",
        		"description"=>"Guildford, United Kingdom"
        	),
        	"173"=> array(
        		"code"=>"eu.gb.*.4583",
        		"description"=>"Harrow, United Kingdom"
        	),
        	"174"=> array(
        		"code"=>"eu.gb.*.4586",
        		"description"=>"Hemel Hempstead, United Kingdom"
        	),
        	"175"=> array(
        		"code"=>"eu.gb.*.4597",
        		"description"=>"Kingston upon Thames, United Kingdom"
        	),
        	"176"=> array(
        		"code"=>"eu.gb.*.4606",
        		"description"=>"Leeds, United Kingdom"
        	),
        	"177"=> array(
        		"code"=>"eu.gb.*.4603",
        		"description"=>"Leicester, United Kingdom"
        	),
        	"178"=> array(
        		"code"=>"eu.gb.*.4573",
        		"description"=>"London, United Kingdom"
        	),
        	"179"=> array(
        		"code"=>"eu.gb.*.4608",
        		"description"=>"Manchester, United Kingdom"
        	),
        	"180"=> array(
        		"code"=>"eu.gb.*.4610",
        		"description"=>"Milton Keynes, United Kingdom"
        	),
        	"181"=> array(
        		"code"=>"eu.gb.*.4612",
        		"description"=>"Newcastle upon Tyne, United Kingdom"
        	),
        	"182"=> array(
        		"code"=>"eu.gb.*.4614",
        		"description"=>"Northampton, United Kingdom"
        	),
        	"183"=> array(
        		"code"=>"eu.gb.*.4613",
        		"description"=>"Nottingham, United Kingdom"
        	),
        	"184"=> array(
        		"code"=>"eu.gb.*.4618",
        		"description"=>"Oxford, United Kingdom"
        	),
        	"185"=> array(
        		"code"=>"eu.gb.*.4623",
        		"description"=>"Portsmouth, United Kingdom"
        	),
        	"186"=> array(
        		"code"=>"eu.gb.*.4625",
        		"description"=>"Reading, United Kingdom"
        	),
        	"187"=> array(
        		"code"=>"eu.gb.*.4626",
        		"description"=>"Redhill, United Kingdom"
        	),
        	"188"=> array(
        		"code"=>"eu.gb.*.4628",
        		"description"=>"Sheffield, United Kingdom"
        	),
        	"189"=> array(
        		"code"=>"eu.gb.*.4632",
        		"description"=>"Slough, United Kingdom"
        	),
        	"190"=> array(
        		"code"=>"eu.gb.*.4635",
        		"description"=>"Southampton, United Kingdom"
        	),
        	"191"=> array(
        		"code"=>"eu.gb.*.4644",
        		"description"=>"Tonbridge, United Kingdom"
        	),
        	"192"=> array(
        		"code"=>"eu.gb.*.4648",
        		"description"=>"Twickenham, United Kingdom"
        	),
        	"193"=> array(
        		"code"=>"la",
        		"description"=>"Latin America"
        	),
        	"194"=> array(
        		"code"=>"la.ar",
        		"description"=>"Argentina"
        	),
        	"195"=> array(
        		"code"=>"la.bo",
        		"description"=>"Bolivia"
        	),
        	"196"=> array(
        		"code"=>"la.br",
        		"description"=>"Brazil"
        	),
        	"197"=> array(
        		"code"=>"la.br.ac",
        		"description"=>"Acre"
        	),
        	"198"=> array(
        		"code"=>"la.br.al",
        		"description"=>"Alagoas"
        	),
        	"199"=> array(
        		"code"=>"la.br.ap",
        		"description"=>"Amapá"
        	),
        	"200"=> array(
        		"code"=>"la.br.am",
        		"description"=>"Amazonas"
        	),
        	"201"=> array(
        		"code"=>"la.br.ba",
        		"description"=>"Bahia"
        	),
        	"202"=> array(
        		"code"=>"la.br.ce",
        		"description"=>"Ceará"
        	),
        	"203"=> array(
        		"code"=>"la.br.df",
        		"description"=>"Distrito Federal"
        	),
        	"204"=> array(
        		"code"=>"la.br.es",
        		"description"=>"Espírito Santo"
        	),
        	"205"=> array(
        		"code"=>"la.br.go",
        		"description"=>"Goiás"
        	),
        	"206"=> array(
        		"code"=>"la.br.ma",
        		"description"=>"Maranhão"
        	),
        	"207"=> array(
        		"code"=>"la.br.mt",
        		"description"=>"Mato Grosso"
        	),
        	"208"=> array(
        		"code"=>"la.br.ms",
        		"description"=>"Mato Grosso do Sul"
        	),
        	"209"=> array(
        		"code"=>"la.br.mg",
        		"description"=>"Minas Gerais"
        	),
        	"210"=> array(
        		"code"=>"la.br.mg.6156",
        		"description"=>"Belo Horizonte Area, Brazil"
        	),
        	"211"=> array(
        		"code"=>"la.br.pr",
        		"description"=>"Paraná"
        	),
        	"212"=> array(
        		"code"=>"la.br.pr.6399",
        		"description"=>"Curitiba Area, Brazil"
        	),
        	"213"=> array(
        		"code"=>"la.br.pb",
        		"description"=>"Paraíba"
        	),
        	"214"=> array(
        		"code"=>"la.br.pa",
        		"description"=>"Pará"
        	),
        	"215"=> array(
        		"code"=>"la.br.pe",
        		"description"=>"Pernambuco"
        	),
        	"216"=> array(
        		"code"=>"la.br.pi",
        		"description"=>"Piauí"
        	),
        	"217"=> array(
        		"code"=>"la.br.rn",
        		"description"=>"Rio Grande do Norte"
        	),
        	"218"=> array(
        		"code"=>"la.br.rs",
        		"description"=>"Rio Grande do Sul"
        	),
        	"219"=> array(
        		"code"=>"la.br.rs.6467",
        		"description"=>"Porto Alegre Area, Brazil"
        	),
        	"220"=> array(
        		"code"=>"la.br.rj",
        		"description"=>"Rio de Janeiro"
        	),
        	"221"=> array(
        		"code"=>"la.br.rj.6034",
        		"description"=>"Rio de Janeiro Area, Brazil"
        	),
        	"222"=> array(
        		"code"=>"la.br.ro",
        		"description"=>"Rondônia"
        	),
        	"223"=> array(
        		"code"=>"la.br.rr",
        		"description"=>"Roraima"
        	),
        	"224"=> array(
        		"code"=>"la.br.sc",
        		"description"=>"Santa Catarina"
        	),
        	"225"=> array(
        		"code"=>"la.br.se",
        		"description"=>"Sergipe"
        	),
        	"226"=> array(
        		"code"=>"la.br.sp",
        		"description"=>"São Paulo"
        	),
        	"227"=> array(
        		"code"=>"la.br.sp.6104",
        		"description"=>"Campinas Area, Brazil"
        	),
        	"228"=> array(
        		"code"=>"la.br.sp.6368",
        		"description"=>"São Paulo Area, Brazil"
        	),
        	"229"=> array(
        		"code"=>"la.br.to",
        		"description"=>"Tocantins"
        	),
        	"230"=> array(
        		"code"=>"la.cl",
        		"description"=>"Chile"
        	),
        	"231"=> array(
        		"code"=>"la.co",
        		"description"=>"Colombia"
        	),
        	"232"=> array(
        		"code"=>"la.cr",
        		"description"=>"Costa Rica"
        	),
        	"233"=> array(
        		"code"=>"la.do",
        		"description"=>"Dominican Republic"
        	),
        	"234"=> array(
        		"code"=>"la.ec",
        		"description"=>"Ecuador"
        	),
        	"235"=> array(
        		"code"=>"la.gt",
        		"description"=>"Guatemala"
        	),
        	"236"=> array(
        		"code"=>"la.mx",
        		"description"=>"Mexico"
        	),
        	"237"=> array(
        		"code"=>"la.mx.*.5921",
        		"description"=>"Mexico City Area, Mexico"
        	),
        	"238"=> array(
        		"code"=>"la.mx.*.5955",
        		"description"=>"Naucalpan de Juárez Area, Mexico"
        	),
        	"239"=> array(
        		"code"=>"la.mx.*.5958",
        		"description"=>"Monterrey, Mexico"
        	),
        	"240"=> array(
        		"code"=>"la.mx.*.5960",
        		"description"=>"Guadalajara, Mexico"
        	),
        	"241"=> array(
        		"code"=>"la.mx.*.5962",
        		"description"=>"Tamaulipas, Mexico"
        	),
        	"242"=> array(
        		"code"=>"la.pa",
        		"description"=>"Panama"
        	),
        	"243"=> array(
        		"code"=>"la.pe",
        		"description"=>"Peru"
        	),
        	"244"=> array(
        		"code"=>"la.pr",
        		"description"=>"Puerto Rico"
        	),
        	"245"=> array(
        		"code"=>"la.tt",
        		"description"=>"Trinidad and Tobago"
        	),
        	"246"=> array(
        		"code"=>"la.uy",
        		"description"=>"Uruguay"
        	),
        	"247"=> array(
        		"code"=>"la.ve",
        		"description"=>"Venezuela"
        	),
        	"248"=> array(
        		"code"=>"me",
        		"description"=>"Middle East"
        	),
        	"249"=> array(
        		"code"=>"me.bh",
        		"description"=>"Bahrain"
        	),
        	"250"=> array(
        		"code"=>"me.il",
        		"description"=>"Israel"
        	),
        	"251"=> array(
        		"code"=>"me.jo",
        		"description"=>"Jordan"
        	),
        	"252"=> array(
        		"code"=>"me.kw",
        		"description"=>"Kuwait"
        	),
        	"253"=> array(
        		"code"=>"me.pk",
        		"description"=>"Pakistan"
        	),
        	"254"=> array(
        		"code"=>"me.qa",
        		"description"=>"Qatar"
        	),
        	"255"=> array(
        		"code"=>"me.sa",
        		"description"=>"Saudi Arabia"
        	),
        	"256"=> array(
        		"code"=>"me.ae",
        		"description"=>"United Arab Emirates"
        	),
        	"257"=> array(
        		"code"=>"na",
        		"description"=>"North America"
        	),
        	"258"=> array(
        		"code"=>"na.ca",
        		"description"=>"Canada"
        	),
        	"259"=> array(
        		"code"=>"na.ca.ab",
        		"description"=>"Alberta"
        	),
        	"260"=> array(
        		"code"=>"na.ca.ab.4882",
        		"description"=>"Calgary, Canada Area"
        	),
        	"261"=> array(
        		"code"=>"na.ca.ab.4872",
        		"description"=>"Edmonton, Canada Area"
        	),
        	"262"=> array(
        		"code"=>"na.ca.bc",
        		"description"=>"British Columbia"
        	),
        	"263"=> array(
        		"code"=>"na.ca.bc.4873",
        		"description"=>"British Columbia, Canada"
        	),
        	"264"=> array(
        		"code"=>"na.ca.bc.4880",
        		"description"=>"Vancouver, Canada Area"
        	),
        	"265"=> array(
        		"code"=>"na.ca.mb",
        		"description"=>"Manitoba"
        	),
        	"266"=> array(
        		"code"=>"na.ca.nb",
        		"description"=>"New Brunswick"
        	),
        	"267"=> array(
        		"code"=>"na.ca.nl",
        		"description"=>"Newfoundland And Labrador"
        	),
        	"268"=> array(
        		"code"=>"na.ca.nt",
        		"description"=>"Northwest Territories"
        	),
        	"269"=> array(
        		"code"=>"na.ca.ns",
        		"description"=>"Nova Scotia"
        	),
        	"270"=> array(
        		"code"=>"na.ca.ns.4874",
        		"description"=>"Halifax, Canada Area"
        	),
        	"271"=> array(
        		"code"=>"na.ca.nu",
        		"description"=>"Nunavut"
        	),
        	"272"=> array(
        		"code"=>"na.ca.on",
        		"description"=>"Ontario"
        	),
        	"273"=> array(
        		"code"=>"na.ca.on.4865",
        		"description"=>"Kitchener, Canada Area"
        	),
        	"274"=> array(
        		"code"=>"na.ca.on.4869",
        		"description"=>"London, Canada Area"
        	),
        	"275"=> array(
        		"code"=>"na.ca.on.4864",
        		"description"=>"Ontario, Canada"
        	),
        	"276"=> array(
        		"code"=>"na.ca.on.4876",
        		"description"=>"Toronto, Canada Area"
        	),
        	"277"=> array(
        		"code"=>"na.ca.pe",
        		"description"=>"Prince Edward Island"
        	),
        	"278"=> array(
        		"code"=>"na.ca.qc",
        		"description"=>"Quebec"
        	),
        	"279"=> array(
        		"code"=>"na.ca.qc.4863",
        		"description"=>"Montreal, Canada Area"
        	),
        	"280"=> array(
        		"code"=>"na.ca.qc.4884",
        		"description"=>"Ottawa, Canada Area"
        	),
        	"281"=> array(
        		"code"=>"na.ca.qc.4875",
        		"description"=>"Quebec, Canada"
        	),
        	"282"=> array(
        		"code"=>"na.ca.qc.4866",
        		"description"=>"Winnipeg, Canada Area"
        	),
        	"283"=> array(
        		"code"=>"na.ca.sk",
        		"description"=>"Saskatchewan"
        	),
        	"284"=> array(
        		"code"=>"na.ca.yt",
        		"description"=>"Yukon"
        	),
        	"285"=> array(
        		"code"=>"na.us",
        		"description"=>"United States"
        	),
        	"286"=> array(
        		"code"=>"na.us.al",
        		"description"=>"Alabama"
        	),
        	"287"=> array(
        		"code"=>"na.us.al.100",
        		"description"=>"Birmingham, Alabama Area"
        	),
        	"288"=> array(
        		"code"=>"na.us.ak",
        		"description"=>"Alaska"
        	),
        	"289"=> array(
        		"code"=>"na.us.ak.38",
        		"description"=>"Anchorage, Alaska Area"
        	),
        	"290"=> array(
        		"code"=>"na.us.az",
        		"description"=>"Arizona"
        	),
        	"291"=> array(
        		"code"=>"na.us.az.620",
        		"description"=>"Phoenix, Arizona Area"
        	),
        	"292"=> array(
        		"code"=>"na.us.az.852",
        		"description"=>"Tucson, Arizona Area"
        	),
        	"293"=> array(
        		"code"=>"na.us.ar",
        		"description"=>"Arkansas"
        	),
        	"294"=> array(
        		"code"=>"na.us.ar.440",
        		"description"=>"Little Rock, Arkansas Area"
        	),
        	"295"=> array(
        		"code"=>"na.us.ca",
        		"description"=>"California"
        	),
        	"296"=> array(
        		"code"=>"na.us.ca.284",
        		"description"=>"Fresno, California Area"
        	),
        	"297"=> array(
        		"code"=>"na.us.ca.49",
        		"description"=>"Greater Los Angeles Area"
        	),
        	"298"=> array(
        		"code"=>"na.us.ca.732",
        		"description"=>"Greater San Diego Area"
        	),
        	"299"=> array(
        		"code"=>"na.us.ca.51",
        		"description"=>"Orange County, California Area"
        	),
        	"300"=> array(
        		"code"=>"na.us.ca.82",
        		"description"=>"Sacramento, California Area"
        	),
        	"301"=> array(
        		"code"=>"na.us.ca.712",
        		"description"=>"Salinas, California Area"
        	),
        	"302"=> array(
        		"code"=>"na.us.ca.84",
        		"description"=>"San Francisco Bay Area"
        	),
        	"303"=> array(
        		"code"=>"na.us.ca.748",
        		"description"=>"Santa Barbara, California Area"
        	),
        	"304"=> array(
        		"code"=>"na.us.ca.812",
        		"description"=>"Stockton, California Area"
        	),
        	"305"=> array(
        		"code"=>"na.us.co",
        		"description"=>"Colorado"
        	),
        	"306"=> array(
        		"code"=>"na.us.co.172",
        		"description"=>"Colorado Springs, Colorado Area"
        	),
        	"307"=> array(
        		"code"=>"na.us.co.267",
        		"description"=>"Fort Collins, Colorado Area"
        	),
        	"308"=> array(
        		"code"=>"na.us.co.34",
        		"description"=>"Greater Denver Area"
        	),
        	"309"=> array(
        		"code"=>"na.us.ct",
        		"description"=>"Connecticut"
        	),
        	"310"=> array(
        		"code"=>"na.us.ct.327",
        		"description"=>"na.us.ct.327"
        	),
        	"311"=> array(
        		"code"=>"na.us.ct.552",
        		"description"=>"New London/Norwich, Connecticut Area"
        	),
        	"312"=> array(
        		"code"=>"na.us.de",
        		"description"=>"Delaware"
        	),
        	"313"=> array(
        		"code"=>"na.us.dc",
        		"description"=>"District Of Columbia"
        	),
        	"314"=> array(
        		"code"=>"na.us.dc.97",
        		"description"=>"Washington D.C. Metro Area"
        	),
        	"315"=> array(
        		"code"=>"na.us.fl",
        		"description"=>"Florida"
        	),
        	"316"=> array(
        		"code"=>"na.us.fl.202",
        		"description"=>"Daytona Beach, Florida Area"
        	),
        	"317"=> array(
        		"code"=>"na.us.fl.270",
        		"description"=>"Fort Myers, Florida Area"
        	),
        	"318"=> array(
        		"code"=>"na.us.fl.271",
        		"description"=>"Fort Pierce, Florida Area"
        	),
        	"319"=> array(
        		"code"=>"na.us.fl.290",
        		"description"=>"Gainesville, Florida Area"
        	),
        	"320"=> array(
        		"code"=>"na.us.fl.398",
        		"description"=>"Lakeland, Florida Area"
        	),
        	"321"=> array(
        		"code"=>"na.us.fl.490",
        		"description"=>"Melbourne, Florida Area"
        	),
        	"322"=> array(
        		"code"=>"na.us.fl.56",
        		"description"=>"Miami/Fort Lauderdale Area"
        	),
        	"323"=> array(
        		"code"=>"na.us.fl.596",
        		"description"=>"Orlando, Florida Area"
        	),
        	"324"=> array(
        		"code"=>"na.us.fl.751",
        		"description"=>"Sarasota, Florida Area"
        	),
        	"325"=> array(
        		"code"=>"na.us.fl.828",
        		"description"=>"Tampa/St. Petersburg, Florida Area"
        	),
        	"326"=> array(
        		"code"=>"na.us.fl.896",
        		"description"=>"West Palm Beach, Florida Area"
        	),
        	"327"=> array(
        		"code"=>"na.us.ga",
        		"description"=>"Georgia"
        	),
        	"328"=> array(
        		"code"=>"na.us.ga.52",
        		"description"=>"Greater Atlanta Area"
        	),
        	"329"=> array(
        		"code"=>"na.us.ga.359",
        		"description"=>"Jacksonville, Florida Area"
        	),
        	"330"=> array(
        		"code"=>"na.us.ga.824",
        		"description"=>"Tallahassee, Florida Area"
        	),
        	"331"=> array(
        		"code"=>"na.us.hi",
        		"description"=>"Hawaii"
        	),
        	"332"=> array(
        		"code"=>"na.us.hi.332",
        		"description"=>"Hawaiian Islands"
        	),
        	"333"=> array(
        		"code"=>"na.us.id",
        		"description"=>"Idaho"
        	),
        	"334"=> array(
        		"code"=>"na.us.id.108",
        		"description"=>"Boise, Idaho Area"
        	),
        	"335"=> array(
        		"code"=>"na.us.il",
        		"description"=>"Illinois"
        	),
        	"336"=> array(
        		"code"=>"na.us.il.14",
        		"description"=>"Greater Chicago Area"
        	),
        	"337"=> array(
        		"code"=>"na.us.il.612",
        		"description"=>"Peoria, Illinois Area"
        	),
        	"338"=> array(
        		"code"=>"na.us.il.140",
        		"description"=>"Urbana-Champaign, Illinois Area"
        	),
        	"339"=> array(
        		"code"=>"na.us.in",
        		"description"=>"Indiana"
        	),
        	"340"=> array(
        		"code"=>"na.us.in.244",
        		"description"=>"Evansville, Indiana Area"
        	),
        	"341"=> array(
        		"code"=>"na.us.in.348",
        		"description"=>"Indianapolis, Indiana Area"
        	),
        	"342"=> array(
        		"code"=>"na.us.ia",
        		"description"=>"Iowa"
        	),
        	"343"=> array(
        		"code"=>"na.us.ks",
        		"description"=>"Kansas"
        	),
        	"344"=> array(
        		"code"=>"na.us.ks.904",
        		"description"=>"Wichita, Kansas Area"
        	),
        	"345"=> array(
        		"code"=>"na.us.ky",
        		"description"=>"Kentucky"
        	),
        	"346"=> array(
        		"code"=>"na.us.ky.428",
        		"description"=>"Lexington, Kentucky Area"
        	),
        	"347"=> array(
        		"code"=>"na.us.ky.452",
        		"description"=>"Louisville, Kentucky Area"
        	),
        	"348"=> array(
        		"code"=>"na.us.la",
        		"description"=>"Louisiana"
        	),
        	"349"=> array(
        		"code"=>"na.us.me",
        		"description"=>"Maine"
        	),
        	"350"=> array(
        		"code"=>"na.us.me.640",
        		"description"=>"Portland, Maine Area"
        	),
        	"351"=> array(
        		"code"=>"na.us.md",
        		"description"=>"Maryland"
        	),
        	"352"=> array(
        		"code"=>"na.us.md.7416",
        		"description"=>"Baltimore, Maryland Area"
        	),
        	"353"=> array(
        		"code"=>"na.us.ma",
        		"description"=>"Massachusetts"
        	),
        	"354"=> array(
        		"code"=>"na.us.ma.7",
        		"description"=>"Greater Boston Area"
        	),
        	"355"=> array(
        		"code"=>"na.us.mi",
        		"description"=>"Michigan"
        	),
        	"356"=> array(
        		"code"=>"na.us.mi.276",
        		"description"=>"Fort Wayne, Indiana Area"
        	),
        	"357"=> array(
        		"code"=>"na.us.mi.35",
        		"description"=>"Greater Detroit Area"
        	),
        	"358"=> array(
        		"code"=>"na.us.mi.300",
        		"description"=>"Greater Grand Rapids, Michigan Area"
        	),
        	"359"=> array(
        		"code"=>"na.us.mi.372",
        		"description"=>"Kalamazoo, Michigan Area"
        	),
        	"360"=> array(
        		"code"=>"na.us.mi.404",
        		"description"=>"Lansing, Michigan Area"
        	),
        	"361"=> array(
        		"code"=>"na.us.mi.696",
        		"description"=>"Saginaw, Michigan Area"
        	),
        	"362"=> array(
        		"code"=>"na.us.mn",
        		"description"=>"Minnesota"
        	),
        	"363"=> array(
        		"code"=>"na.us.mn.512",
        		"description"=>"Greater Minneapolis-St. Paul Area"
        	),
        	"364"=> array(
        		"code"=>"na.us.ms",
        		"description"=>"Mississippi"
        	),
        	"365"=> array(
        		"code"=>"na.us.ms.76",
        		"description"=>"Baton Rouge, Louisiana Area"
        	),
        	"366"=> array(
        		"code"=>"na.us.ms.556",
        		"description"=>"Greater New Orleans Area"
        	),
        	"367"=> array(
        		"code"=>"na.us.ny.684",
        		"description"=>"Rochester, New York Area"
        	),
        	"368"=> array(
        		"code"=>"na.us.ny.816",
        		"description"=>"Syracuse, New York Area"
        	),
        	"369"=> array(
        		"code"=>"na.us.nc",
        		"description"=>"North Carolina"
        	),
        	"370"=> array(
        		"code"=>"na.us.nc.152",
        		"description"=>"Charlotte, North Carolina Area"
        	),
        	"371"=> array(
        		"code"=>"na.us.nc.664",
        		"description"=>"Raleigh-Durham, North Carolina Area"
        	),
        	"372"=> array(
        		"code"=>"na.us.nc.920",
        		"description"=>"Wilmington, North Carolina Area"
        	),
        	"373"=> array(
        		"code"=>"na.us.nd",
        		"description"=>"North Dakota"
        	),
        	"374"=> array(
        		"code"=>"na.us.oh",
        		"description"=>"Ohio"
        	),
        	"375"=> array(
        		"code"=>"na.us.oh.21",
        		"description"=>"Cincinnati Area"
        	),
        	"376"=> array(
        		"code"=>"na.us.oh.28",
        		"description"=>"Cleveland/Akron, Ohio Area"
        	),
        	"377"=> array(
        		"code"=>"na.us.oh.184",
        		"description"=>"Columbus, Ohio Area"
        	),
        	"378"=> array(
        		"code"=>"na.us.oh.200",
        		"description"=>"Dayton, Ohio Area"
        	),
        	"379"=> array(
        		"code"=>"na.us.oh.840",
        		"description"=>"Toledo, Ohio Area"
        	),
        	"380"=> array(
        		"code"=>"na.us.ok",
        		"description"=>"Oklahoma"
        	),
        	"381"=> array(
        		"code"=>"na.us.ok.588",
        		"description"=>"Oklahoma City, Oklahoma Area"
        	),
        	"382"=> array(
        		"code"=>"na.us.ok.856",
        		"description"=>"Tulsa, Oklahoma Area"
        	),
        	"383"=> array(
        		"code"=>"na.us.or",
        		"description"=>"Oregon"
        	),
        	"384"=> array(
        		"code"=>"na.us.or.240",
        		"description"=>"Eugene, Oregon Area"
        	),
        	"385"=> array(
        		"code"=>"na.us.or.79",
        		"description"=>"Portland, Oregon Area"
        	),
        	"386"=> array(
        		"code"=>"na.us.pa",
        		"description"=>"Pennsylvania"
        	),
        	"387"=> array(
        		"code"=>"na.us.pa.24",
        		"description"=>"Allentown, Pennsylvania Area"
        	),
        	"388"=> array(
        		"code"=>"na.us.pa.77",
        		"description"=>"Greater Philadelphia Area"
        	),
        	"389"=> array(
        		"code"=>"na.us.pa.628",
        		"description"=>"Greater Pittsburgh Area"
        	),
        	"390"=> array(
        		"code"=>"na.us.pa.324",
        		"description"=>"Harrisburg, Pennsylvania Area"
        	),
        	"391"=> array(
        		"code"=>"na.us.pa.96",
        		"description"=>"Ithaca, New York Area"
        	),
        	"392"=> array(
        		"code"=>"na.us.pa.400",
        		"description"=>"Lancaster, Pennsylvania Area"
        	),
        	"393"=> array(
        		"code"=>"na.us.pa.756",
        		"description"=>"Scranton, Pennsylvania Area"
        	),
        	"394"=> array(
        		"code"=>"na.us.ri",
        		"description"=>"Rhode Island"
        	),
        	"395"=> array(
        		"code"=>"na.us.ri.648",
        		"description"=>"Providence, Rhode Island Area"
        	),
        	"396"=> array(
        		"code"=>"na.us.sc",
        		"description"=>"South Carolina"
        	),
        	"397"=> array(
        		"code"=>"na.us.sc.60",
        		"description"=>"Augusta, Georgia Area"
        	),
        	"398"=> array(
        		"code"=>"na.us.sc.144",
        		"description"=>"Charleston, South Carolina Area"
        	),
        	"399"=> array(
        		"code"=>"na.us.sc.176",
        		"description"=>"Columbia, South Carolina Area"
        	),
        	"400"=> array(
        		"code"=>"na.us.sc.316",
        		"description"=>"Greenville, South Carolina Area"
        	),
        	"401"=> array(
        		"code"=>"na.us.sc.752",
        		"description"=>"Savannah, Georgia Area"
        	),
        	"402"=> array(
        		"code"=>"na.us.sd",
        		"description"=>"South Dakota"
        	),
        	"403"=> array(
        		"code"=>"na.us.sd.776",
        		"description"=>"Sioux Falls, South Dakota Area"
        	),
        	"404"=> array(
        		"code"=>"na.us.tn",
        		"description"=>"Tennessee"
        	),
        	"405"=> array(
        		"code"=>"na.us.tn.48",
        		"description"=>"Asheville, North Carolina Area"
        	),
        	"406"=> array(
        		"code"=>"na.us.tn.156",
        		"description"=>"Chattanooga, Tennessee Area"
        	),
        	"407"=> array(
        		"code"=>"na.us.tn.492",
        		"description"=>"Greater Memphis Area"
        	),
        	"408"=> array(
        		"code"=>"na.us.tn.536",
        		"description"=>"Greater Nashville Area"
        	),
        	"409"=> array(
        		"code"=>"na.us.tn.344",
        		"description"=>"Huntsville, Alabama Area"
        	),
        	"410"=> array(
        		"code"=>"na.us.tn.366",
        		"description"=>"Johnson City, Tennessee Area"
        	),
        	"411"=> array(
        		"code"=>"na.us.tn.384",
        		"description"=>"Knoxville, Tennessee Area"
        	),
        	"412"=> array(
        		"code"=>"na.us.tx",
        		"description"=>"Texas"
        	),
        	"413"=> array(
        		"code"=>"na.us.tx.64",
        		"description"=>"Austin, Texas Area"
        	),
        	"414"=> array(
        		"code"=>"na.us.tx.31",
        		"description"=>"Dallas/Fort Worth Area"
        	),
        	"415"=> array(
        		"code"=>"na.us.tx.232",
        		"description"=>"El Paso, Texas Area"
        	),
        	"416"=> array(
        		"code"=>"na.us.tx.42",
        		"description"=>"Houston, Texas Area"
        	),
        	"417"=> array(
        		"code"=>"na.us.tx.724",
        		"description"=>"San Antonio, Texas Area"
        	),
        	"418"=> array(
        		"code"=>"na.us.ut",
        		"description"=>"Utah"
        	),
        	"419"=> array(
        		"code"=>"na.us.ut.716",
        		"description"=>"Greater Salt Lake City Area"
        	),
        	"420"=> array(
        		"code"=>"na.us.ut.652",
        		"description"=>"Provo, Utah Area"
        	),
        	"421"=> array(
        		"code"=>"na.us.vt",
        		"description"=>"Vermont"
        	),
        	"422"=> array(
        		"code"=>"na.us.vt.130",
        		"description"=>"Burlington, Vermont Area"
        	),
        	"423"=> array(
        		"code"=>"na.us.vt.800",
        		"description"=>"Springfield, Massachusetts Area"
        	),
        	"424"=> array(
        		"code"=>"na.us.va",
        		"description"=>"Virginia"
        	),
        	"425"=> array(
        		"code"=>"na.us.va.154",
        		"description"=>"Charlottesville, Virginia Area"
        	),
        	"426"=> array(
        		"code"=>"na.us.va.312",
        		"description"=>"Greensboro/Winston-Salem, North Carolina Area"
        	),
        	"427"=> array(
        		"code"=>"na.us.va.572",
        		"description"=>"Norfolk, Virginia Area"
        	),
        	"428"=> array(
        		"code"=>"na.us.va.676",
        		"description"=>"Richmond, Virginia Area"
        	),
        	"429"=> array(
        		"code"=>"na.us.va.680",
        		"description"=>"Roanoke, Virginia Area"
        	),
        	"430"=> array(
        		"code"=>"na.us.wa",
        		"description"=>"Washington"
        	),
        	"431"=> array(
        		"code"=>"na.us.wa.91",
        		"description"=>"Greater Seattle Area4"
        	),
        	"432"=> array(
        		"code"=>"na.us.wa.784",
        		"description"=>"Spokane, Washington Area"
        	),
        	"433"=> array(
        		"code"=>"na.us.wv",
        		"description"=>"West Virginia"
        	),
        	"434"=> array(
        		"code"=>"na.us.wi",
        		"description"=>"Wisconsin"
        	),
        	"435"=> array(
        		"code"=>"na.us.wi.63",
        		"description"=>"Greater Milwaukee Area"
        	),
        	"436"=> array(
        		"code"=>"na.us.wi.308",
        		"description"=>"Green Bay, Wisconsin Area"
        	),
        	"437"=> array(
        		"code"=>"na.us.wi.472",
        		"description"=>"Madison, Wisconsin Area"
        	),
        	"438"=> array(
        		"code"=>"na.us.wi.46",
        		"description"=>"Oshkosh, Wisconsin Area"
        	),
        	"439"=> array(
        		"code"=>"na.us.wi.688",
        		"description"=>"Rockford, Illinois Area"
        	),
        	"440"=> array(
        		"code"=>"na.us.wy",
        		"description"=>"Wyoming"
        	),
        	"441"=> array(
        		"code"=>"oc",
        		"description"=>"Oceania"
        	),
        	"442"=> array(
        		"code"=>"oc.au",
        		"description"=>"Australia"
        	),
        	"443"=> array(
        		"code"=>"oc.au.*.4886",
        		"description"=>"Adelaide Area, Australia"
        	),
        	"444"=> array(
        		"code"=>"oc.au.*.4909",
        		"description"=>"Brisbane Area, Australia"
        	),
        	"445"=> array(
        		"code"=>"oc.au.*.4893",
        		"description"=>"Canberra Area, Australia"
        	),
        	"446"=> array(
        		"code"=>"oc.au.*.4900",
        		"description"=>"Melbourne Area, Australia"
        	),
        	"447"=> array(
        		"code"=>"oc.au.*.4905",
        		"description"=>"Perth Area, Australia"
        	),
        	"448"=> array(
        		"code"=>"oc.au.*.4910",
        		"description"=>"Sydney Area, Australia"
        	),
        	"449"=> array(
        		"code"=>"oc.nz",
        		"description"=>"New Zealand"
        	)
        );

		foreach ($locations as $key => $value) {
			$newLocation= new App\models\Locations();
			$newLocation->country_code= $value['code'];
			$newLocation->name= $value['description'];
			$newLocation->save();
		}
    }
}
