var postCtrl = ['$rootScope', '$state', '$scope', 'RootService','$stateParams',  function($rootScope, $state, scope,  clubService,$stateParams){

 	scope.init = function(){
 		scope.setUser();
 		scope.bSending = false;
 	};

 	scope.setUser = function(){
 		scope.user = {
 			to: null,
 			email: null
 		};
 	};

 	scope.send = function(){
 		if(scope.user.to && scope.user.email){
 			scope.bSending = true;
 			var request = clubService.sendRequest('POST', '/send-invitation', scope.user);
 			request.then(function(response){
 				scope.bSending = false;
 				console.log('scope.response!!!', response);
 				scope.setUser();
 				clubService.addNotification('invitation sent', 'success');
 			}, function(error){
 				clubService.addNotification('error sending invitation', 'error');
 			});
 		}else{
 			clubService.addNotification('please fill both fields');
 		}

 	};

 	scope.init();

}];


angular.module('app')
	.controller('postCtrl', postCtrl);