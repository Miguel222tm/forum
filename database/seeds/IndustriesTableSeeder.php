<?php

use Illuminate\Database\Seeder;

use App\models\Industry;
class IndustriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industry= array(
        	array(
        		'code'=>'47',
        		'groups'=> 'corp, fin',
        		'description'=>'Accounting'
        	),
        	array(
        		'code'=>'94',
        		'groups'=> 'man, tech, tran',
        		'description'=>'Airlines/Aviation'
        	),
        	array(
        		'code'=>'120',
        		'groups'=> 'leg, org',
        		'description'=>'Alternative Dispute Resolution'
        	),
        	array(
        		'code'=>'125',
        		'groups'=> 'hlth',
        		'description'=>'Alternative Medicine'
        	),
        	array(
        		'code'=>'127',
        		'groups'=> 'art, med',
        		'description'=>'Animation'
        	),
        	array(
        		'code'=>'19',
        		'groups'=> 'good',
        		'description'=>'Apparel & Fashion'
        	),
        	array(
        		'code'=>'50',
        		'groups'=> 'cons',
        		'description'=>'Architecture & Planning'
        	),
        	array(
        		'code'=>'111',
        		'groups'=> 'art, med, rec',
        		'description'=>'Arts and Crafts'
        	),
        	array(
        		'code'=>'53',
        		'groups'=> 'man',
        		'description'=>'Automotive'
        	),
        	array(
        		'code'=>'52',
        		'groups'=> 'gov, man',
        		'description'=>'Aviation & Aerospace'
        	),
        	array(
        		'code'=>'41',
        		'groups'=> 'fin',
        		'description'=>'Banking'
        	),
        	array(
        		'code'=>'12',
        		'groups'=> 'gov, hlth, tech',
        		'description'=>'Biotechnology'
        	),
        	array(
        		'code'=>'36',
        		'groups'=> 'med, rec',
        		'description'=>'Broadcast Media'
        	),
        	array(
        		'code'=>'49',
        		'groups'=> 'cons',
        		'description'=>'Building Materials'
        	),
        	array(
        		'code'=>'138',
        		'groups'=> 'corp, man',
        		'description'=>'Business Supplies and Equipment'
        	),
        	array(
        		'code'=>'129',
        		'groups'=> 'fin',
        		'description'=>'Capital Markets'
        	),
        	array(
        		'code'=>'54',
        		'groups'=> 'man',
        		'description'=>'Chemicals'
        	),
        	array(
        		'code'=>'90',
        		'groups'=> 'org, serv',
        		'description'=>'Civic & Social Organization'
        	),
        	array(
        		'code'=>'51',
        		'groups'=> 'cons, gov',
        		'description'=>'Civil Engineering'
        	),
        	array(
        		'code'=>'128',
        		'groups'=> 'cons, corp, fin',
        		'description'=>'Commercial Real Estate'
        	),
        	array(
        		'code'=>'118',
        		'groups'=> 'tech',
        		'description'=>'Computer & Network Security'
        	),
        	array(
        		'code'=>'109',
        		'groups'=> 'med, rec',
        		'description'=>'Computer Games'
        	),
        	array(
        		'code'=>'3',
        		'groups'=> 'tech',
        		'description'=>'Computer Hardware'
        	),
        	array(
        		'code'=>'5',
        		'groups'=> 'tech',
        		'description'=>'Computer Networking'
        	),
        	array(
        		'code'=>'4',
        		'groups'=> 'tech',
        		'description'=>'Computer Software'
        	),
        	array(
        		'code'=>'48',
        		'groups'=> 'cons',
        		'description'=>'Construction'
        	),
        	array(
        		'code'=>'24',
        		'groups'=> 'good, man',
        		'description'=>'Consumer Electronics'
        	),
        	array(
        		'code'=>'25',
        		'groups'=> 'good, man',
        		'description'=>'Consumer Goods'
        	),
        	array(
        		'code'=>'91',
        		'groups'=> 'org, serv',
        		'description'=>'Consumer Services'
        	),
        	array(
        		'code'=>'18',
        		'groups'=> 'good',
        		'description'=>'Cosmetics'
        	),
        	array(
        		'code'=>'65',
        		'groups'=> 'agr',
        		'description'=>'Dairy'
        	),
        	array(
        		'code'=>'1',
        		'groups'=> 'gov, tech',
        		'description'=>'Defense & Space'
        	),
        	array(
        		'code'=>'99',
        		'groups'=> 'art, med',
        		'description'=>'Design'
        	),
        	array(
        		'code'=>'69',
        		'groups'=> 'edu',
        		'description'=>'Education Management'
        	),
        	array(
        		'code'=>'132',
        		'groups'=> 'edu, org',
        		'description'=>'E-Learning'
        	),
        	array(
        		'code'=>'112',
        		'groups'=> 'good, man',
        		'description'=>'Electrical/Electronic Manufacturing'
        	),
        	array(
        		'code'=>'28',
        		'groups'=> 'med, rec',
        		'description'=>'Entertainment'
        	),
        	array(
        		'code'=>'86',
        		'groups'=> 'org, serv',
        		'description'=>'Environmental Services'
        	),
        	array(
        		'code'=>'110',
        		'groups'=> 'corp, rec, serv',
        		'description'=>'Events Services'
        	),
        	array(
        		'code'=>'76',
        		'groups'=> 'gov',
        		'description'=>'Executive Office'
        	),
        	array(
        		'code'=>'122',
        		'groups'=> 'corp, serv',
        		'description'=>'Facilities Services'
        	),
        	array(
        		'code'=>'63',
        		'groups'=> 'agr',
        		'description'=>'Farming'
        	),
        	array(
        		'code'=>'43',
        		'groups'=> 'fin',
        		'description'=>'Financial Services'
        	),
        	array(
        		'code'=>'38',
        		'groups'=> 'art, med, rec',
        		'description'=>'Fine Art'
        	),
        	array(
        		'code'=>'66',
        		'groups'=> 'agr',
        		'description'=>'Fishery'
        	),
        	array(
        		'code'=>'34',
        		'groups'=> 'rec, serv',
        		'description'=>'Food & Beverages'
        	),
        	array(
        		'code'=>'23',
        		'groups'=> 'good, man, serv',
        		'description'=>'Food Production'
        	),
        	array(
        		'code'=>'101',
        		'groups'=> 'org',
        		'description'=>'Fund-Raising'
        	),
        	array(
        		'code'=>'26',
        		'groups'=> 'good, man',
        		'description'=>'Furniture'
        	),
        	array(
        		'code'=>'29',
        		'groups'=> 'rec',
        		'description'=>'Gambling & Casinos'
        	),
        	array(
        		'code'=>'145',
        		'groups'=> 'cons, man',
        		'description'=>'Glass, Ceramics & Concrete'
        	),
        	array(
        		'code'=>'75',
        		'groups'=> 'gov',
        		'description'=>'Government Administration'
        	),
        	array(
        		'code'=>'148',
        		'groups'=> 'gov',
        		'description'=>'Government Relations'
        	),
        	array(
        		'code'=>'140',
        		'groups'=> 'art, med',
        		'description'=>'Graphic Design'
        	),
        	array(
        		'code'=>'124',
        		'groups'=> 'hlth, rec',
        		'description'=>'Health, Wellness and Fitness'
        	),
        	array(
        		'code'=>'68',
        		'groups'=> 'edu',
        		'description'=>'Higher Education'
        	),
        	array(
        		'code'=>'14',
        		'groups'=> 'hlth',
        		'description'=>'Hospital & Health Care'
        	),
        	array(
        		'code'=>'31',
        		'groups'=> 'rec, serv, tran',
        		'description'=>'Hospitality'
        	),
        	array(
        		'code'=>'137',
        		'groups'=> 'corp',
        		'description'=>'Human Resources'
        	),
        	array(
        		'code'=>'134',
        		'groups'=> 'corp, good, tran',
        		'description'=>'Import and Export'
        	),
        	array(
        		'code'=>'88',
        		'groups'=> 'org, serv',
        		'description'=>'Individual & Family Services'
        	),
        	array(
        		'code'=>'147',
        		'groups'=> 'cons, man',
        		'description'=>'Industrial Automation'
        	),
        	array(
        		'code'=>'84',
        		'groups'=> 'med, serv',
        		'description'=>'Information Services'
        	),
        	array(
        		'code'=>'96',
        		'groups'=> 'tech',
        		'description'=>'Information Technology and Services'
        	),
        	array(
        		'code'=>'42',
        		'groups'=> 'fin',
        		'description'=>'Insurance'
        	),
        	array(
        		'code'=>'74',
        		'groups'=> 'gov',
        		'description'=>'International Affairs'
        	),
        	array(
        		'code'=>'141',
        		'groups'=> 'gov, org, tran',
        		'description'=>'International Trade and Development'
        	),
        	array(
        		'code'=>'6',
        		'groups'=> 'tech',
        		'description'=>'Internet'
        	),
        	array(
        		'code'=>'45',
        		'groups'=> 'fin',
        		'description'=>'Investment Banking'
        	),
        	array(
        		'code'=>'46',
        		'groups'=> 'fin',
        		'description'=>'Investment Management'
        	),
        	array(
        		'code'=>'73',
        		'groups'=> 'gov, leg',
        		'description'=>'Judiciary'
        	),
        	array(
        		'code'=>'77',
        		'groups'=> 'gov, leg',
        		'description'=>'Law Enforcement'
        	),
        	array(
        		'code'=>'9',
        		'groups'=> 'leg',
        		'description'=>'Law Practice'
        	),
        	array(
        		'code'=>'10',
        		'groups'=> 'leg',
        		'description'=>'Legal Services'
        	),
        	array(
        		'code'=>'72',
        		'groups'=> 'gov, leg',
        		'description'=>'Legislative Office'
        	),
        	array(
        		'code'=>'30',
        		'groups'=> 'rec, serv, tran',
        		'description'=>'Leisure, Travel & Tourism'
        	),
        	array(
        		'code'=>'85',
        		'groups'=> 'med, rec, serv',
        		'description'=>'Libraries'
        	),
        	array(
        		'code'=>'116',
        		'groups'=> 'corp, tran',
        		'description'=>'Logistics and Supply Chain'
        	),
        	array(
        		'code'=>'143',
        		'groups'=> 'good',
        		'description'=>'Luxury Goods & Jewelry'
        	),
        	array(
        		'code'=>'55',
        		'groups'=> 'man',
        		'description'=>'Machinery'
        	),
        	array(
        		'code'=>'11',
        		'groups'=> 'corp',
        		'description'=>'Management Consulting'
        	),
        	array(
        		'code'=>'95',
        		'groups'=> 'tran',
        		'description'=>'Maritime'
        	),
        	array(
        		'code'=>'97',
        		'groups'=> 'corp',
        		'description'=>'Market Research'
        	),
        	array(
        		'code'=>'80',
        		'groups'=> 'corp, med',
        		'description'=>'Marketing and Advertising'
        	),
        	array(
        		'code'=>'135',
        		'groups'=> 'cons, gov, man',
        		'description'=>'Mechanical or Industrial Engineering'
        	),
        	array(
        		'code'=>'126',
        		'groups'=> 'med, rec',
        		'description'=>'Media Production'
        	),
        	array(
        		'code'=>'17',
        		'groups'=> 'hlth',
        		'description'=>'Medical Devices'
        	),
        	array(
        		'code'=>'13',
        		'groups'=> 'hlth',
        		'description'=>'Medical Practice'
        	),
        	array(
        		'code'=>'139',
        		'groups'=> 'hlth',
        		'description'=>'Mental Health Care'
        	),
        	array(
        		'code'=>'71',
        		'groups'=> 'gov',
        		'description'=>'Military'
        	),
        	array(
        		'code'=>'56',
        		'groups'=> 'man',
        		'description'=>'Mining & Metals'
        	),
        	array(
        		'code'=>'35',
        		'groups'=> 'art, med, rec',
        		'description'=>'Motion Pictures and Film'
        	),
        	array(
        		'code'=>'37',
        		'groups'=> 'art, med, rec',
        		'description'=>'Museums and Institutions'
        	),
        	array(
        		'code'=>'115',
        		'groups'=> 'art, rec',
        		'description'=>'Music'
        	),
        	array(
        		'code'=>'114',
        		'groups'=> 'gov, man, tech',
        		'description'=>'Nanotechnology'
        	),
        	array(
        		'code'=>'81',
        		'groups'=> 'med, rec',
        		'description'=>'Newspapers'
        	),
        	array(
        		'code'=>'100',
        		'groups'=> 'org',
        		'description'=>'Non-Profit Organization Management'
        	),
        	array(
        		'code'=>'57',
        		'groups'=> 'man',
        		'description'=>'Oil & Energy'
        	),
        	array(
        		'code'=>'113',
        		'groups'=> 'med',
        		'description'=>'Online Media'
        	),
        	array(
        		'code'=>'123',
        		'groups'=> 'corp',
        		'description'=>'Outsourcing/Offshoring'
        	),
        	array(
        		'code'=>'87',
        		'groups'=> 'serv, tran',
        		'description'=>'Package/Freight Delivery'
        	),
        	array(
        		'code'=>'146',
        		'groups'=> 'good, man',
        		'description'=>'Packaging and Containers'
        	),
        	array(
        		'code'=>'61',
        		'groups'=> 'man',
        		'description'=>'Paper & Forest Products'
        	),
        	array(
        		'code'=>'39',
        		'groups'=> 'art, med, rec',
        		'description'=>'Performing Arts'
        	),
        	array(
        		'code'=>'15',
        		'groups'=> 'hlth, tech',
        		'description'=>'Pharmaceuticals'
        	),
        	array(
        		'code'=>'131',
        		'groups'=> 'org',
        		'description'=>'Philanthropy'
        	),
        	array(
        		'code'=>'136',
        		'groups'=> 'art, med, rec',
        		'description'=>'Photography'
        	),
        	array(
        		'code'=>'117',
        		'groups'=> 'man',
        		'description'=>'Plastics'
        	),
        	array(
        		'code'=>'107',
        		'groups'=> 'gov, org',
        		'description'=>'Political Organization'
        	),
        	array(
        		'code'=>'67',
        		'groups'=> 'edu',
        		'description'=>'Primary/Secondary Education'
        	),
        	array(
        		'code'=>'83',
        		'groups'=> 'med, rec',
        		'description'=>'Printing'
        	),
        	array(
        		'code'=>'105',
        		'groups'=> 'corp',
        		'description'=>'Professional Training & Coaching'
        	),
        	array(
        		'code'=>'102',
        		'groups'=> 'corp, org',
        		'description'=>'Program Development'
        	),
        	array(
        		'code'=>'79',
        		'groups'=> 'gov',
        		'description'=>'Public Policy'
        	),
        	array(
        		'code'=>'98',
        		'groups'=> 'corp',
        		'description'=>'Public Relations and Communications'
        	),
        	array(
        		'code'=>'78',
        		'groups'=> 'gov',
        		'description'=>'Public Safety'
        	),
        	array(
        		'code'=>'82',
        		'groups'=> 'med, rec',
        		'description'=>'Publishing'
        	),
        	array(
        		'code'=>'62',
        		'groups'=> 'man',
        		'description'=>'Railroad Manufacture'
        	),
        	array(
        		'code'=>'64',
        		'groups'=> 'agr',
        		'description'=>'Ranching'
        	),
        	array(
        		'code'=>'44',
        		'groups'=> 'cons, fin, good',
        		'description'=>'Real Estate'
        	),
        	array(
        		'code'=>'40',
        		'groups'=> 'rec, serv',
        		'description'=>'Recreational Facilities and Services'
        	),
        	array(
        		'code'=>'89',
        		'groups'=> 'org, serv',
        		'description'=>'Religious Institutions'
        	),
        	array(
        		'code'=>'144',
        		'groups'=> 'gov, man, org',
        		'description'=>'Renewables & Environment'
        	),
        	array(
        		'code'=>'70',
        		'groups'=> 'edu, gov',
        		'description'=>'Research'
        	),
        	array(
        		'code'=>'32',
        		'groups'=> 'rec, serv',
        		'description'=>'Restaurants'
        	),
        	array(
        		'code'=>'27',
        		'groups'=> 'good, man',
        		'description'=>'Retail'
        	),
        	array(
        		'code'=>'121',
        		'groups'=> 'corp, org, serv',
        		'description'=>'Security and Investigations'
        	),
        	array(
        		'code'=>'7',
        		'groups'=> 'tech',
        		'description'=>'Semiconductors'
        	),
        	array(
        		'code'=>'58',
        		'groups'=> 'man',
        		'description'=>'Shipbuilding'
        	),
        	array(
        		'code'=>'20',
        		'groups'=> 'good, rec',
        		'description'=>'Sporting Goods'
        	),
        	array(
        		'code'=>'33',
        		'groups'=> 'rec',
        		'description'=>'Sports'
        	),
        	array(
        		'code'=>'104',
        		'groups'=> 'corp',
        		'description'=>'Staffing and Recruiting'
        	),
        	array(
        		'code'=>'22',
        		'groups'=> 'good',
        		'description'=>'Supermarkets'
        	),
        	array(
        		'code'=>'8',
        		'groups'=> 'gov, tech',
        		'description'=>'Telecommunications'
        	),
        	array(
        		'code'=>'60',
        		'groups'=> 'man',
        		'description'=>'Textiles'
        	),
        	array(
        		'code'=>'130',
        		'groups'=> 'gov, org',
        		'description'=>'Think Tanks'
        	),
        	array(
        		'code'=>'21',
        		'groups'=> 'good',
        		'description'=>'Tobacco'
        	),
        	array(
        		'code'=>'108',
        		'groups'=> 'corp, gov, serv',
        		'description'=>'Translation and Localization'
        	),
        	array(
        		'code'=>'92',
        		'groups'=> 'tran',
        		'description'=>'Transportation/Trucking/Railroad'
        	),
        	array(
        		'code'=>'59',
        		'groups'=> 'man',
        		'description'=>'Utilities'
        	),
        	array(
        		'code'=>'106',
        		'groups'=> 'fin, tech',
        		'description'=>'Venture Capital & Private Equity'
        	),
        	array(
        		'code'=>'16',
        		'groups'=> 'hlth',
        		'description'=>'Veterinary'
        	),
        	array(
        		'code'=>'93',
        		'groups'=> 'tran',
        		'description'=>'Warehousing'
        	),
        	array(
        		'code'=>'133',
        		'groups'=> 'good',
        		'description'=>'Wholesale'
        	),
        	array(
        		'code'=>'142',
        		'groups'=> 'good, man, rec',
        		'description'=>'Wine and Spirits'
        	),
        	array(
        		'code'=>'119',
        		'groups'=> 'tech',
        		'description'=>'Wireless'
        	),
        	array(
        		'code'=>'103',
        		'groups'=> 'art, med, rec',
        		'description'=>'Writing and Editing'
        	)
        );
		
		foreach ($industry as $key => $value) {
			$ind= new App\models\Industry();
			$ind->code= $value['code'];
			$ind->groups= $value['groups'];
			$ind->description= $value['description'];
			$ind->save();
		}
    }
}
