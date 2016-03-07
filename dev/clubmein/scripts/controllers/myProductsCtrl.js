var myProductsCtrl = ['$rootScope', '$state', '$scope', 'RootService','vendorService', function($rootScope, $state, scope,  clubService, vendorService){


	scope.init = function(){

		scope.myProducts = null;
		console.log($rootScope.currentUser);
		getItemCategories();
		scope.user = $rootScope.currentUSer;
		
		scope.getMyProducts();
			
	};

	function getItemCategories(){
		if(!clubService.getCategories()){
			var request = clubService.sendRequest('GET', '/categories?bundle=true');
			request.then(function(response){
				console.log('categories!', response);
				scope.categories = response;
				scope.categories.push({name: 'Other', code: 'otr'});
				clubService.setCategories(scope.categories);
			}, function(error){
				clubService.addNotification('error getting the categories', 'error');
			});
		}else{
			scope.categories = clubService.getCategories();
		}
	}

	scope.getMyProducts = function(){
		if(!vendorService.getProducts()){
			var request = clubService.sendRequest('GET', '/vendor/products');
			request.then(function(response){
				console.log('my products ',response)
				scope.myProducts = response;
				vendorService.setProducts(response);
			}, function(error){
				clubService.addNotification('error getting your products', 'error');
			});
		}else{
			scope.myProducts = vendorService.getProducts();
		}

	};


scope.addProduct = function(){
		var product = {
			categoryId: 0, 
			productId: 0, 
			brandId: 0, 
			modelId: 0, 
			category_name: null, 
			product_name: null, 
			brand_name: null, 
			model_name: null, 
			active: false
		};
		vendorService.addProduct(product);
		scope.myProducts = vendorService.getProducts();
	};


	scope.init();


}];

angular.module('app')
	.controller('myProductsCtrl', myProductsCtrl);