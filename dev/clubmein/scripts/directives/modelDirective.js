var model = ['$state','RootService','$rootScope','$mdDialog', function($state, clubService, $rootScope, $mdDialog){

	return {
		restrict: 'E', 
		templateUrl: 'views/page/model.html', 
		scope:{
			model: '=',
			user: '='
		},
		link: function(scope, element, attrs){
			
			scope.init = function(){
				scope.bShowChild = false;
			};
			

			scope.init();




		}
	};

}];


angular.module('app')
	.directive('model', model);