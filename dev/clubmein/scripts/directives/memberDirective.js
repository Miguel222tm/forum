var member = ['$state','RootService','$rootScope','$mdDialog','$timeout','adminService','$mdMedia', function($state, clubService, $rootScope, $mdDialog, $timeout, adminService, $mdMedia){
		
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
				if(scope.bShowEdit){
					scope.bShowEdit = false;
				}
				else{
					scope.bShowEdit = true;
				}
			};

			scope.cancel = function(){
				scope.bShowEdit = false;
				scope.bDesactivate = false;
			};

			scope.activateUser = function(booleano){
				if(booleano){
					scope.member.user.active = true;
					scope.member.user.reason = "";
				}
				else{
					scope.member.user.active = false;
					console.log('reason', scope.member.user.reason);
				}
				var request = clubService.sendRequest('PUT','/users/'+scope.member.user.userId+'/activate', scope.member.user);
				request.then(function(response){
					scope.member.user = response;
					if(response.active)
						clubService.addNotification(scope.member.name+' activated', 'success');
					else
						clubService.addNotification(scope.member.name+ ' disactivated', 'success');

					scope.bDesactivate = false;
				}, function(error){
					clubService.addNotification('error changing status to '+ scope.member.name, 'error');
				});
			};


			scope.desactivate = function(){
				scope.bDesactivate = true;
			};

			scope.init();
		}


	};


}];


angular.module('app')
	.directive('member', member);