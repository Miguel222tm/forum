var clubCtrl =  ['$rootScope', '$state', '$scope', 'RootService', 'MembersService', function($rootScope, $state, scope,  clubService, membersService){

	scope.init = function(){
		getClub();
		getModels();
		scope.club;
		scope.clubModelos;
	};

	function getClub(){
		if(membersService.getClub())
			scope.club = membersService.getClub();
		else{
			$state.go('app.home');
		}

		//console.log('scope.club', scope.club);
	}

	function getModels(){
		scope.clubModelos = [];
		angular.forEach(scope.club.items, function(item, key){
			if(scope.clubModelos.indexOf(item.model_name) === -1){
				scope.clubModelos.push({brand: item.brand_name , modelo: item.model_name });
			}
		});
		//console.log('scope.clubModelos!!!',scope.clubModelos);
		asignItemsToModel(scope.clubModelos);
	}



	function asignItemsToModel(modelos){
		angular.forEach(scope.clubModelos, function(modelo, key){
			modelo.items = [];
			//console.log('modelo', modelo);
			angular.forEach(scope.club.items, function(item, key){
				//console.log('items here all of them', item);
				if(item.model_name === modelo.modelo && item.brand_name === modelo.brand){
					modelo.items.push(item);
					//console.log('new item!', item);
				}
			});
		});
		//console.log('scope.clubModelos!!!',scope.clubModelos);
	}


	scope.goToClubModelo = function(modelo){
		membersService.setClubModelo(modelo);
		$state.go('app.modelo');
	}

	scope.init();

}];



angular.module('app')
	.controller('clubCtrl', clubCtrl);



