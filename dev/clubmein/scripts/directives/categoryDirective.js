var category = ['$state','RootService','$rootScope','$mdDialog','$timeout','adminService', function($state, clubService, $rootScope, $mdDialog, $timeout, adminService){

	return {
		restrict: 'E', 
		templateUrl: 'views/page/category.html', 
		scope:{
			category: '=',
			user: '='
		},
		link: function(scope, element, attrs){

			scope.init = function(){
				scope.bShowChild = false;
				if(scope.category.categoryId){
					scope.bShowEdit = false;
				}else{
					scope.bShowEdit = true;
				}

				if(scope.category.active === 1)
					scope.category.active = true;
				else
					scope.category.active =  false;

				//console.log('active', scope.category.active);

				scope.safeCategory = angular.copy(scope.category);


			};
			scope.loadProducts = function(){
				if(!scope.category.products){
					var request = clubService.sendRequest('GET','/category/'+scope.category.categoryId+"/products");
					request.then(function(response){
						scope.category.products = response;
						console.log('scope.category.poroducts', scope.category.products);
					}, function(error){
						clubService.addNotification('error getting '+ scope.category.name +' products', 'error');
					});
				}
				$timeout(function () {
			        scope.$apply(function () {
			            scope.bShowChild = true;
			        });
			    }, 300);

				console.log('bShowChild', scope.bShowChild);
			};

			scope.hideProducts = function(){
				scope.bShowChild = false;
			};

			scope.showEdit = function(){
				scope.bShowEdit = true;
			};

			scope.hideEdit = function(){
				scope.bShowEdit = false;
				scope.category = angular.copy(scope.safeCategory);
			};

			scope.save = function(){
				if(!scope.category.categoryId && scope.category.name && scope.category.code){
					var request = clubService.sendRequest('POST', '/categories', scope.category);
					request.then( function(response){
						scope.category = response;
						adminService.addCategory(response);
						scope.safeCategory = angular.copy(scope.category);
						clubService.addNotification(scope.category.name+ ' saved.', 'success');
						scope.bShowEdit = false;
					}, function(error){
						clubService.addNotification('error saving your new category', 'error');
					});
				}
				if(scope.category.categoryId && scope.category.name && scope.category.code){
					scope.edit();
				}
			};

			scope.edit = function(){
				var request = clubService.sendRequest('PUT', '/category/'+scope.category.categoryId, scope.category);
					request.then( function(response){
						console.log('edited', response);
						scope.category.name = response.name;
						scope.category.code = response.code;
						scope.category.active = response.active;
						scope.safeCategory = angular.copy(scope.category);	
						adminService.editCategory(response);
						clubService.addNotification(scope.category.name+ ' edited.', 'success');
						scope.bShowEdit = false;
					}, function(error){
						clubService.addNotification('error editing your  category', 'error');
					});
			};


			scope.showConfirm = function(ev, code, type){
				 // Appending dialog to document.body to cover sidenav in docs app
			   var confirm = $mdDialog.confirm()
			          .title('Do you really want delete this category ?')
			          .textContent('Please confirm your answer.')
			          .ariaLabel('Lucky day')
			          .targetEvent(ev)
			          .ok('Yes')
			          .cancel("Cancel");

			   $mdDialog.show(confirm).then(function() {
		    		scope.deleteCategory();
		    	
			    }, function() {
			      console.log('canceled');
			    });
		    
			};

			scope.deleteCategory = function(){
				if(scope.category.categoryId){
					var request= clubService.sendRequest('DELETE', '/category/'+scope.category.categoryId);
					request.then(function(response){
						adminService.removeCategory(response);
						scope.category = null;
						scope.bShowEdit = false;
						clubService.addNotification(response.name + ' deleted.', 'success');
					}, function(error){
						clubService.addNotification('error deleting this category', 'error');
					});
				}else{
					scope.category = null;
				}
			};



			scope.addProduct = function(){

				var product = {
					categoryId: scope.category.categoryId,
					name: "",
					active: false,	
				};
				var array = [];
				angular.forEach(scope.category.products, function(product, key){
					if(product.productId)
						array.push(product);
				});
				array.push(product);
				scope.category.products = array;
			};




			scope.init();




		}
	};

}];


angular.module('app')
	.directive('category', category);