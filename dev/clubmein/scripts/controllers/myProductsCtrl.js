var myProductsCtrl = ['$rootScope', '$state', '$scope', 'RootService','vendorService', function($rootScope, $state, scope,  clubService, vendorService){


	scope.init = function(){

		scope.myProducts = null;
		console.log($rootScope.currentUser);
		scope.user = $rootScope.currentUSer;
		setTimeout(function() {
			scope.getMyProducts();
		}, 1000);	
		




	};

	scope.getMyProducts = function(){
		if(!vendorService.getProducts()){
			var request = clubService.sendRequest('GET', '/vendor/'+$rootScope.currentUser.vendorId+'/products');
			request.then(function(response){
				scope.myProducts = response;
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