var category = ['$state','RootService','$rootScope','$mdDialog','$timeout', function($state, clubService, $rootScope, $mdDialog, $timeout){

	return {
		restrict: 'E', 
		templateUrl: 'views/page/category.html', 
		scope:{
			category: '=',
			user: '='
		},
		link: function(scope, element, attrs){

			scope.init = function(){
				scope.bShowChild = false;
			};
			scope.loadProducts = function(){
				if(!scope.category.products){
					var request = clubService.sendRequest('GET','/category/'+scope.category.categoryId+"/products");
					request.then(function(response){
						scope.category.products = response;
						console.log('scope.category.poroducts', scope.category.products);
					}, function(error){
						clubService.addNotification('error getting '+ scope.category.name +' products', 'error');
					});
				}
				$timeout(function () {
			        scope.$apply(function () {
			            scope.bShowChild = true;
			        });
			    }, 300);

				console.log('bShowChild', scope.bShowChild);
			};

			scope.hideProducts = function(){
				scope.bShowChild = false;
			};
			scope.init();




		}
	};

}];


angular.module('app')
	.directive('category', category);