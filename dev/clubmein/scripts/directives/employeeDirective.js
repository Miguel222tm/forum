var employee = ['$state','RootService','$rootScope','$mdDialog','$timeout','adminService', function($state, clubService, $rootScope, $mdDialog, $timeout, adminService){
		
	return {
		restrict: 'E', 
		templateUrl: 'views/page/employee.html',
		scope:{
			employee: '='
		},
		link: function(scope, element, attrs){

			scope.init = function(){
				scope.bShowEdit = false;
			};
		
			scope.showDetails = function(){
				if(scope.bShowEdit)
					scope.bShowEdit = false;
				else
					scope.bShowEdit = true;
			};

			scope.activateUser = function(booleano){
				if(booleano)
					scope.employee.user.active = true;
				else
					scope.employee.user.active = false;
				var request = clubService.sendRequest('PUT','/users/'+scope.employee.user.userId+'/activate', scope.employee.user);
				request.then(function(response){
					scope.employee.user = response;
					if(response.active)
						clubService.addNotification(scope.employee.name+' activated', 'success');
					else
						clubService.addNotification(scope.employee.name+ ' disactivated', 'success');
				}, function(error){
					clubService.addNotification('error changing status to '+ scope.employee.name, 'error');
				});
			};

			scope.init();
		}


	};


}];


angular.module('app')
	.directive('employee', employee);