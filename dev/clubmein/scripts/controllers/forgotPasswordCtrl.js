var forgotPasswordCtrl = ['$state','$stateParams','RootService','$scope','$rootScope', function($state, $stateParams, $RootService, scope, $rootScope){
	console.log('forgot it', $stateParams);


	scope.init = function(){
		
		if($stateParams.code){
			scope.bForm = true;
			scope.bConfirmation = false;
			scope.getUser();
		}
	};

	


	scope.getUser = function(){
  		console.log('enter on getUser');
        if(!$RootService.getCurrentUser()){
            var request= $RootService.sendRequest('get','/verify-user?code='+$stateParams.code);
            request.then( function(response){
                
	            scope.currentUser = response;
                
            }, function(error){
                $RootService.addNotification('error getting user', 'error');
            });
        }else{
            $rootScope.currentUser = $RootService.getCurrentUser();
        }

    };



    scope.change= function(password){
    	
    	console.log('password',password);
    	var request = $RootService.sendRequest('PUT', 'user/'+scope.currentUser.userId+'/reset-password', {password:password});
    	request.then(function(response){
    		console.log(response);
       		$RootService.addNotification('password changed');
    		scope.bForm  = false;
    		scope.bConfirmation = true;
    		
    	}, function(error){
    		$RootService.addNotification('error changing password', 'error');
    	});

    };





    scope.init();

}];

angular.module('app')
	.controller('forgotPasswordCtrl', forgotPasswordCtrl);