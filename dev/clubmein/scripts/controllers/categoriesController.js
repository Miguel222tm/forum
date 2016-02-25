var categoriesCtrl = ['$state', '$scope','RootService',  function($state, scope, clubService){
	console.log('categoriesCtrl' );

	scope.init = function(){
		getCategories();
	};

	function getCategories(){
		if(clubService.getCategories()){
			scope.categories = MembersService.getCategories();
			var config = {
				data:{
					products: true, 
					brands: true, 
					models: true, 
				}
			};
		}else{
			var request =clubService.sendRequest('GET', '/categories', config);
			request.then(function(response){
				scope.categories = response;
			
				console.log('categories!', scope.categories);
			}, function(error){	
				clubService.addNotification('error getting categories', error);
			});
		}
	}


	scope.init();
}];


angular.module('app')
	.controller('categoriesCtrl', categoriesCtrl);