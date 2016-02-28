var clubModeloCtrl =  ['$rootScope', '$state', '$scope', 'RootService', 'MembersService', function($rootScope, $state, scope,  clubService, membersService){

	scope.clubModelo = null;
	scope.init = function(){
		
		getClubModelo();
	};

	function getClubModelo(){
		if(membersService.getClubModelo()){
			scope.clubModelo = membersService.getClubModelo();
			console.log('scope.clubModelo', scope.clubModelo);
		}
		else{
			$state.go('app.nearby');
		}
	}

	scope.addItem = function(){
		var array = [];
		angular.forEach(scope.clubModelo.items, function(item, key){
			if(item.itemId)
				array.push(item);
		});
		scope.item = {
			itemId: 'clubIn',
			categoryId: scope.clubModelo.items[0].categoryId, 
			productId: scope.clubModelo.items[0].productId, 
			brandId: scope.clubModelo.items[0].brandId, 
			modelId: scope.clubModelo.items[0].modelId, 
			category_name: scope.clubModelo.items[0].category_name, 
			product_name: scope.clubModelo.items[0].product_name, 
			brand_name: scope.clubModelo.items[0].brand_name, 
			model_name: scope.clubModelo.items[0].model_name, 
			quantity: 1, 
			price: 0, 
			description: "", 
			active: true
		};
		array.push(scope.item);
		scope.clubModelo.items = array;
	};



	scope.init();
}];


angular.module('app')
	.controller('clubModeloCtrl', clubModeloCtrl);