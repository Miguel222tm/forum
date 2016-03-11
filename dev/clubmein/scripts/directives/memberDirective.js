var member = ['$state','RootService','$rootScope','$mdDialog','$timeout','adminService', function($state, clubService, $rootScope, $mdDialog, $timeout, adminService){
		
	return {
		restrict: 'E', 
		templateUrl: 'views/page/member.html',
		scope:{
			member: '='
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
					scope.member.user.active = true;
				else
					scope.member.user.active = false;
				var request = clubService.sendRequest('PUT','/users/'+scope.member.user.userId+'/activate', scope.member.user);
				request.then(function(response){
					scope.member.user = response;
					if(response.active)
						clubService.addNotification(scope.member.name+' activated', 'success');
					else
						clubService.addNotification(scope.member.name+ ' disactivated', 'success');
				}, function(error){
					clubService.addNotification('error changing status to '+ scope.member.name, 'error');
				});
			};

			scope.init();
		}


	};


}];


angular.module('app')
	.directive('member', member);