var brand = ['$state','RootService','$rootScope','$mdDialog','$timeout', function($state, clubService, $rootScope, $mdDialog, $timeout){

	return {
		restrict: 'E', 
		templateUrl: 'views/page/brand.html', 
		scope:{
			brand: '=',
			user: '='
		},
		link: function(scope, element, attrs){
			
			scope.init = function(){
				scope.bShowChild = false;
			};
			scope.loadModels = function(){
				if(!scope.brand.models){
					var request = clubService.sendRequest('GET','/brand/'+scope.brand.brandId+"/models");
					request.then(function(response){
						scope.brand.models = response;
						console.log('scope.brand.models', scope.brand.models);
					}, function(error){
						clubService.addNotification('error getting '+ scope.brand.name +' models', 'error');
					});
				}
				$timeout(function () {
			        scope.$apply(function () {
			            scope.bShowChild = true;
			        });
			    }, 300);

				console.log('bShowChild', scope.bShowChild);
			};

			scope.hideModels = function(){
				scope.bShowChild = false;
			};
			scope.init();




		}
	};

}];


angular.module('app')
	.directive('brand', brand);