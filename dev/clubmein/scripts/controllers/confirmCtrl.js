var confirmCtrl = ['$state' ,'RootService','$stateParams','$scope', function($state, clubService, $stateParams, scope){
	
	console.log('$stateParams', $stateParams);	


	scope.init = function(){
		scope.code = $stateParams.code;
		if(scope.code){
			getUser();
		}
		
	};

	function getUser(){
		console.log('enter on getUser');
        if(!clubService.getCurrentUser()){
            var request= clubService.sendRequest('get','/verify-user?code='+$stateParams.code);
            request.then( function(response){
                
	            scope.user = response;
                
            }, function(error){
                clubService.addNotification('error getting user', 'error');
            });
        }else{
            $rootScope.currentUser = clubService.getCurrentUser();
        }
	}


	scope.confirmAccount = function(){
		if(scope.user){
			scope.user.active = true;
			var request = clubService.sendRequest('PUT', '/users/'+scope.user.userId+'/activate', scope.user);
			request.then(function(response){
				$state.go('access.signin');
			}, function(error){
				clubService.addNotification('error activating your account', 'error');
			});
		}
	};

	scope.init();
}];

angular.module('app')
	.controller('confirmCtrl', confirmCtrl);