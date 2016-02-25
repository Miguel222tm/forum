var product = ['$state','RootService','$rootScope','$mdDialog','$timeout', function($state, clubService, $rootScope, $mdDialog, $timeout){

	return {
		restrict: 'E', 
		templateUrl: 'views/page/product.html', 
		scope:{
			product: '=',
			user: '='
		},
		link: function(scope, element, attrs){
			//console.log('hello product!', scope.product);
			scope.init = function(){
				scope.bShowChild = false;
			};
			scope.loadBrands = function(){
				if(!scope.product.brands){
					var request = clubService.sendRequest('GET','/product/'+scope.product.productId+"/brands");
					request.then(function(response){
						scope.product.brands = response;
						console.log('scope.product.brands', scope.product.brands);
					}, function(error){
						clubService.addNotification('error getting '+ scope.product.name +' brands', 'error');
					});
				}

				$timeout(function () {
			        scope.$apply(function () {
			            scope.bShowChild = true;
			        });
			    }, 300);

				console.log('bShowChild', scope.bShowChild);
			};

			scope.hideBrands = function(){
				scope.bShowChild = false;
			};

			scope.init();




		}
	};

}];


angular.module('app')
	.directive('product', product);