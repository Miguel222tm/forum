var vendor = ['$state','RootService','$rootScope','$mdDialog','$timeout','adminService', function($state, clubService, $rootScope, $mdDialog, $timeout, adminService){
		
	return {
		restrict: 'E', 
		templateUrl: 'views/page/vendor.html',
		scope:{
			vendor: '='
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

			scope.hideDetails = function(){
				scope.bShowEdit = false;
			};

			scope.cancel = function(){
				scope.bShowEdit = false;
				scope.bDesactivate = false;
			};

			scope.activateUser = function(booleano){
				if(booleano){
					scope.vendor.user.active = true;
					scope.vendor.user.reason = "";
				}
				else{
					scope.vendor.user.active = false;
					console.log('reason', scope.vendor.user.reason);
				}
				var request = clubService.sendRequest('PUT','/users/'+scope.vendor.user.userId+'/activate', scope.vendor.user);
				request.then(function(response){
					scope.vendor.user = response;
					if(response.active)
						clubService.addNotification(scope.vendor.name+' activated', 'success');
					else
						clubService.addNotification(scope.vendor.name+ ' disactivated', 'success');
				}, function(error){
					clubService.addNotification('error changing status to '+ scope.vendor.name, 'error');
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
	.directive('vendor', vendor);