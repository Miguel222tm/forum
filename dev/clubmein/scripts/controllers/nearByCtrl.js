var nearByCtrl =  ['$rootScope', '$state', '$scope', 'RootService','MembersService', function($rootScope, $state, scope,  clubService, MembersService){
	
	
	scope.init = function(){
		scope.items = [];
		scope.categories = [];
		scope.clubs = [];
		getCategories();
		getNearByItems();
	};

	function getCategories(){
		if(MembersService.getCategories()){
			scope.categories = MembersService.getCategories();
		}else{
			var request =clubService.sendRequest('GET', '/categories');
			request.then(function(response){
				scope.categories = response;
				MembersService.setCategories(response);
				//console.log('categories!', scope.categories);
			}, function(error){	
				clubService.addNotification('error getting categories', error);
			});
		}
	}


	function getNearByItems(){
		var request = clubService.sendRequest('GET', 'near');

		request.then(function(response){
			setFinalItems(response);
			console.log('got the items', response);
		}, function(error){
			clubService.addNotification('error getting nearBy items', 'error');
		});
	}


	function setFinalItems(nearBy){
		angular.forEach(nearBy, function(near, key){
			if(near.item){
				scope.items.push(near.item);
			}
		});
		scope.setCategoryItems(scope.items);
	}

	scope.setCategoryItems= function(items){
		angular.forEach(scope.categories, function(category, key){
			category.items = [];
			angular.forEach(items, function(item, key){
				if(category.categoryId === item.categoryId){
					category.items.push(item);
					console.log('found!' );
				}
			});
		});
		MembersService.setCategories(scope.categories);
		scope.clubs = [];
		angular.forEach(scope.categories, function(category, key){
			if(category.items.length)
				scope.clubs.push(category);
		});
		console.log('clubs!', scope.clubs);

	}


	scope.goToClub = function(club){
		console.log('you clicked on ', club);
		MembersService.setClub(club);
		$state.go('app.club');

	};

	scope.init();







}];


angular.module('app')
	.controller('nearByCtrl', nearByCtrl);
