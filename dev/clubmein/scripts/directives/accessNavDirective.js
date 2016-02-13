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

			angular.forEach(scope.user.functionalities, function(func, key){
				switch(func.code){
						
					case "fn_home":
						scope.menu.push({
							hierarchy: 1,
							level: 0,
							hidden: false,
							icon: 'fa fa-home',
							label: 'Home',
							state: 'app.home'
						});	
						break;
					case "fn_search":
						scope.menu.push({
							hierarchy: 2,
							level: 0,
							hidden: false,
							icon: 'fa fa-search',
							label: 'Search',
							state: 'app.search'
						});
						break;
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

				}
				if(scope.user.access_level === 1){
					switch(func.code){
	
						case "fn_near_by":
							scope.menu.push({
								hierarchy: 4,
								level: 0,
								hidden: false,
								icon: 'fa fa-users',
								label: 'Near by',
								state: 'app.nearby'
							});
							break;
						
					}
				}
				/*=======================================
				=            employee           =
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
				if(scope.user.access_level === 3){
					switch(func.code){
						
						
					}
				}

			});
			//console.log('menu', scope.menu);

		}

	};	
}];


angular.module('app')
	.directive('accessNav', accessNav);