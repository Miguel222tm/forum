var clubModeloCtrl =  ['$rootScope', '$state', '$scope', 'RootService', 'MembersService', function($rootScope, $state, scope,  clubService, membersService){

	scope.clubModelo = null;
	scope.init = function(){
		
		getClubModelo();
	};

	function getClubModelo(){
		if(membersService.getClubModelo())
			scope.clubModelo = membersService.getClubModelo();
		else
			$state.go('app.nearby');
	}




	scope.init();
}];


angular.module('app')
	.controller('clubModeloCtrl', clubModeloCtrl);