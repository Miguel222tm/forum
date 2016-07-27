var itemsCtrl =  ['$rootScope', '$state', '$scope', 'RootService', 'MembersService', function($rootScope, $state, scope,  clubService, membersService){
	


	function init(){
		scope.items = [];
		scope.countries = null;
		scope.requests = [];

		
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
				membersService.setItems(response);
				//console.log('scope.items', scope.items);
				
			}, function(error){
				clubService.addNotification("error getting member's items", 'error');
			});
		}
	}

	scope.haveRequests = function(){
		var booleano = false;
		angular.forEach(scope.items, function(item, key){
			if(!item.active)
				booleano = true;
		});
		return booleano;
	};

	function getItemCategories(){
		if(!membersService.getCategories()){
			var request = clubService.sendRequest('GET', '/categories?bundle=true');
			request.then(function(response){
				console.log('response!', response);
				scope.categories = response;
				scope.categories.push({name: 'Other', code: 'otr'});
				
				membersService.setCategories(scope.categories);
			}, function(error){
				clubService.addNotification('error getting the categories', 'error');
			});
		}else{
			scope.categories = membersService.getCategories();
		}
	}
	scope.addItem = function(){
		var item = {
			categoryId: 0, 
			productId: 0, 
			brandId: 0, 
			modelId: 0, 
			category_name: null, 
			product_name: null, 
			brand_name: null, 
			model_name: null, 
			quantity: 1, 
			price: 0, 
			description: "", 
			active: false
		};

		membersService.addItems(item);
		scope.items = membersService.getItems();
		//console.log('scope.items', scope.items);
	};

	init();
}];


angular.module('app')
	.controller('itemsCtrl', itemsCtrl);
