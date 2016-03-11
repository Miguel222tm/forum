var membersListCtrl = ['$state', '$scope','RootService', function($state, scope, clubService){
	//	console.log('membersListCtrl' );

	scope.init = function(){
		getMemberList();
	};


	function getMemberList(){
		var request = clubService.sendRequest('GET','/members');
		request.then(function(response){
			scope.memberList = response;
			console.log('memberList', response);
		}, function(error){
			clubService.addNotification('error getting members', 'error');
		});
	}


	scope.init();


}];


angular.module('app')
	.controller('membersListCtrl', membersListCtrl);