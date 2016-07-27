var employeesListCtrl = ['$state', '$scope','RootService','$rootScope', function($state, scope, clubService, $rootScope){
	//	console.log('membersListCtrl' );

	scope.init = function(){
		getMemberList();
	};


	function getMemberList(){
		var request = clubService.sendRequest('GET','/employees');
		request.then(function(response){
			scope.employeesList = response;
			console.log('employeesList', response);
		}, function(error){
			clubService.addNotification('error getting employees', 'error');
		});
	}


	scope.init();


}];


angular.module('app')
	.controller('employeesListCtrl', employeesListCtrl);