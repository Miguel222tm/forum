var item = ['$state','RootService', function($state, clubService){
	return {
		restrict: 'E',
		templateUrl: 'views/partials/item.html', 
		scope: {
			user: '=', 
			item: '=',
			categories: '=',
		},
		link: function(scope){
			console.log('item: ', scope.item);
			scope.country;
			scope.state;
			scope.category;
			scope.products = [];

			scope.setCategory = function(){
				console.log('scope.category', scope.category);
				if(scope.category){
					scope.item.categoryId = scope.category.categoryId;
					scope.item.category_name = scope.category.name;

					scope.item.productId = null;
					scope.item.product_name = null;

					//console.log('scope.item::::', scope.item);
					var request = clubService.sendRequest('GET', '/category/'+scope.item.categoryId+'/products');
					request.then(function (response){
						scope.products = response;
						console.log('products ', response);
					}, function(){
					 	clubService.addNotification('error getting the products', 'error');
					});
				}	
							
			};

			scope.setProduct = function(){
				if(scope.product){
					scope.item.productId = scope.product.productId;
					scope.item.product_name = scope.product.name;

					var request = clubService.sendRequest('GET', '/product/'+scope.item.productId+'/brands');
					request.then(function(response){
						scope.brands = response;
						console.log('brands', scope.brands);
					}, function(error){
						clubService.addNotification('error getting the brands');
					});
				}

			};

			scope.setCountry = function(country){
				scope.country = country;
			};
			scope.setState = function(state){
				scope.state = state;
			};
			scope.setCity = function(city){
				scope.city = city;
			};

			scope.otherLocation = function(){
				scope.item.otherLocation != scope.item.otherlocation;
				//console.log('scope.item.otherLocation', scope.item.otherLocation);
			}

			



		}

	};
	
}];


angular.module('app')
	.directive('item', item);