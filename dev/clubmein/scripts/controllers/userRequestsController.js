var userRequestsCtrl = ['$state', '$scope','RootService','adminService',  function($state, scope, clubService,  adminService){
		console.log('userRequestsCtrl' );


		scope.init = function(){
			scope.userRequests = null;
			getUserRequests();

		};


		function getUserRequests(){
			var request = clubService.sendRequest('GET' , '/items?active=false');
			request.then(function(response){
				scope.userRequests = response;
				console.log('userRequests', response);
			}, function(error){
				clubService.sendRequest('error getting user requests', 'error');
			})
		}

		scope.init();



}];


angular.module('app')
	.controller('userRequestsCtrl', userRequestsCtrl);