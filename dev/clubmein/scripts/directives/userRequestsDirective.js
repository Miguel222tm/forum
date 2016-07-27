var userRequest = ['$state','RootService','$rootScope','$mdDialog','$timeout','adminService', function($state, clubService, $rootScope, $mdDialog, $timeout, adminService){
	return{

		restrict: 'E', 
		templateUrl: 'views/page/request.html', 
		scope:{
			request: '=',
			user: '='
		},
		link: function(scope, element, attrs){


		}


	};

}];

angular.module('app')
	.directive('userRequest', userRequest);