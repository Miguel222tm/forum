var itemsCtrl =  ['$rootScope', '$state', '$scope', 'RootService', 'MembersService', function($rootScope, $state, scope,  clubService, membersService){
	
	console.log('itemsCtrl', scope.currentUser);

	function init(){
		scope.items = [];
		scope.countries = null;

		
		getItems();
		getItemCategories();
	}

	function getItems(){
		if(membersService.getItems()){
			scope.items = membersService.getItems();
		}else{
			var request;
			request = clubService.sendRequest('GET', 'members/items');
			request.then(function(response){
				scope.items = response;
				//console.log('scope.items', scope.items);
			}, function(error){
				clubService.addNotification("error getting member's items", 'error');
			});
		}
	}

	scope.addItem = function(){
		var item = {
			categoryId: null, 
			productId: null, 
			brandId: null, 
			modelId: null, 
			category_name: null, 
			product_name: null, 
			brand_name: null, 
			model_name: "new", 
			quantity: 0, 
			price: 0, 
			description: null, 
			active: false
		};

		if(!newItem()){
			scope.items.push(item);
		}
		//console.log('scope.items', scope.items);
	};

	function newItem(){
		var booleano = false;
		angular.forEach(scope.items, function(item, key){
			if(item && !item.itemId){
				booleano = true;
			}
		});
		return booleano;
	}

	function getItemCategories(){
		if(!membersService.getCategories()){
			var request = clubService.sendRequest('GET', '/categories');
			request.then(function(response){
				scope.categories = response;
				console.log('categories:: ', response);
				membersService.setCategories(response);
			}, function(error){
				clubService.addNotification('error getting the categories', 'error');
			});
		}else{
			scope.categories = membersService.getCategories();
		}
	}



	init();
}];


angular.module('app')
	.controller('itemsCtrl', itemsCtrl);
