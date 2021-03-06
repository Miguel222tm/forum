var categoriesCtrl = ['$state', '$scope','RootService','adminService',  function($state, scope, clubService,  adminService){

	scope.init = function(){
		getCategories();
	};

	function getCategories(){

			var request =clubService.sendRequest('GET', '/categories', config);
			request.then(function(response){
				scope.categories = response;
				adminService.setCategories(response);
				console.log('categories!', scope.categories);
			}, function(error){	
				clubService.addNotification('error getting categories', error);
			});
		
	}

	scope.addCategory = function (){
		var category = {
			name: "", 
			code: "", 
			active: false
		};

		adminService.addCategory(category);
		scope.categories = adminService.getCategories();
	};


	scope.init();
}];


angular.module('app')
	.controller('categoriesCtrl', categoriesCtrl);