var userRequestsCtrl = ['$state', '$scope','RootService','adminService',  function($state, scope, clubService,  adminService){
		console.log('userRequestsCtrl' );


		scope.init = function(){
			scope.userRequests = null;
			scope.countries = null;
			getUserRequests();
			getItemCategories();
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

		function getItemCategories(){
			var request = clubService.sendRequest('GET', '/categories?bundle=true');
			request.then(function(response){
				console.log('response!', response);
				scope.categories = response;
				scope.categories.push({name: 'Other', code: 'otr'});
		
			}, function(error){
				clubService.addNotification('error getting the categories', 'error');
			});
		}

		scope.init();



}];


angular.module('app')
	.controller('userRequestsCtrl', userRequestsCtrl);