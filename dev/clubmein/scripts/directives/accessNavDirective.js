var accessNav = ['$state', function($state){
	return{
    	restrict: 'E',
		templateUrl: 'views/partials/access-nav.html',
		scope: {
			user: '='
		}, 
		link: function(scope){
			scope.menu = [];
			scope.submenu =[];
			scope.topMenu =[];

			scope.menu.push({
				hierarchy: 1,
				level: 0,
				hidden: false,
				icon: 'fa fa-home',
				label: 'Home',
				state: 'app.home'
			});	

			scope.menu.push({
				hierarchy: 4,
				level: 0,
				hidden: false,
				icon: 'fa fa-users',
				label: 'Search',
				state: 'app.nearby'
			});

			angular.forEach(scope.user.functionalities, function(func, key){
				switch(func.code){
						
					
					

				}
				if(scope.user.access_level === 1){
					switch(func.code){

						case "fn_items":
						scope.menu.push({
							hierarchy: 3,
							level: 0,
							hidden: false,
							icon: 'fa fa-paper-plane',
							label: 'Items',
							state: 'app.items'
						});
						break;
	
						case "fn_near_by":
							
							break;
						
					}
				}
				/*=======================================
				=            vendor           =
				=======================================*/			
				if(scope.user.access_level === 2 || scope.user.access_level === 3){
					switch(func.code){
						/* items, nearby, my bids*/
						
						case "fn_near_by":
							scope.menu.push({
								hierarchy: 3,
								level: 0,
								hidden: false,
								icon: 'fa fa-users',
								label: 'Near by',
								state: 'app.nearby'
							});
							break;
						case "fn_my_products":
							scope.menu.push({
								hierarchy: 4,
								level: 0,
								submenus: false,
								hidden: false,
								icon: 'fa fa-book',
								label: 'My Products',
								state: 'app.myproducts'
							});
							break;
						case "fn_my_bids":
							scope.menu.push({
								hierarchy: 5,
								level: 0,
								submenus: false,
								hidden: false,
								icon: 'fa fa-sitemap',
								label: 'My bids',
								state: 'app.mybids'
							});
							break;
					}
				}

				/*=============================================
				=            employee				          =
				=============================================*/
				
				if(scope.user.access_level === 3 || scope.user.access_level === 4){
					switch(func.code){
						
						case "fn_categories":
							scope.menu.push({
								hierarchy: 3,
								level: 0,
								hidden: false,
								icon: 'fa fa-list',
								label: 'Categories',
								state: 'app.categories'
							});
						break;
						case "fn_requests":
							scope.menu.push({
								hierarchy: 4,
								level: 0,
								hidden: false,
								icon: 'fa fa-book',
								label: 'Requests',
								state: 'app.requests'
							});
						break;
						case "fn_users":
							scope.menu.push({
								hierarchy: 5,
								level: 0,
								hidden: false,
								submenus: true, 
								icon: 'fa fa-book',
								label: 'Users',
								state: 'app.requests',
								active: false,
							});
						break;
							case "fn_users_members":
								scope.submenu.push({
									hierarchy: 5,
									level: 1,
									hidden: false,
									icon: 'fa fa-users',
									label: 'Members',
									state: 'app.members'
								});
							break;
							case "fn_users_vendors":
								scope.submenu.push({
									hierarchy: 5,
									level: 1,
									hidden: false,
									icon: 'fa fa-users',
									label: 'Vendors',
									state: 'app.vendors'
								});
							break;
						case "fn_fees":
							scope.menu.push({
								hierarchy: 6,
								level: 0,
								hidden: false,
								icon: 'fa fa-credit-card',
								label: 'Fees',
								state: 'app.fees'
							});
						break;
							


					}
				}

				if(scope.user.access_level === 4){
					switch(func.code){
						case "fn_users_vendors":
							scope.submenu.push({
								hierarchy: 5,
								level: 1,
								hidden: false,
								icon: 'fa fa-users',
								label: 'Employees',
								state: 'app.employees'
							});
						break;
					}
				}

			});
			//console.log('menu', scope.menu);

		}

	};	
}];


angular.module('app')
	.directive('accessNav', accessNav);