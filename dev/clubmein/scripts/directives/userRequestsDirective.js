var userRequest = ['$state','RootService','$rootScope','$mdDialog','$timeout','adminService', function($state, clubService, $rootScope, $mdDialog, $timeout, adminService){
	return{

		restrict: 'E', 
		templateUrl: 'views/page/request.html', 
		scope:{
			request: '=',
			user: '=',
			categories: '='
		},
		link: function(scope, element, attrs){

			scope.init = function(){
				scope.bContent = false;
				scope.category = null;
				scope.product = null;
				scope.brand = null;
				scope.model = null;
				console.log('scope.categories', scope.categories);
				scope.safeRequest = angular.copy(scope.request);
				setInitialValues();
			};

			function setInitialValues(){
				if(scope.request.categoryId){
					angular.forEach(scope.categories, function(category, key){
						if(scope.request.categoryId === category.categoryId){
							scope.category = category;
							console.log('initial category', scope.category);
							scope.setInitialProduct(category);
						}
					});
				}
			}

			scope.setInitialProduct = function(category){
				if(scope.request.productId){
					angular.forEach(category.products, function(product, key){
						if(scope.request.productId === product.productId){
							scope.product = product;
							scope.setInitialBrand(product);
						}
					});
				}
			};

			scope.setInitialBrand = function(product){
				if(scope.request.brandId){
					angular.forEach(product.brands, function(brand, key){
						if(scope.request.brandId === brand.brandId){
							scope.brand = brand;
							scope.setInitialModel(brand);
						}
					});
				}
			};

			scope.setInitialModel = function(brand){
				if(scope.request.modelId){
					angular.forEach(brand.models, function(model, key){
						if(scope.request.modelId === model.modelId){
							scope.model = model;
						}
					});
				}
			};

			scope.showContent = function(){
				scope.bContent = true;
			};

			scope.cancel = function(){
				scope.request= angular.copy(scope.safeRequest);
				scope.bContent= false;
			};

			scope.setCategory = function(category){
				scope.category = category;
				console.log('scope.category', scope.category);
			};

			scope.setProduct = function(product){
				scope.product = product;
				console.log('product ', scope.product);
			};

			scope.setBrand = function(brand){
				scope.brand = brand;
				console.log('brand ', scope.brand);
			};

			scope.setModel = function(model){
				scope.model = model;
				console.log('model ', scope.model);
			};

			scope.save = function(){
				if(scope.category && scope.product && scope.brand && scope.model){
					scope.request.active = true;
					scope.request.categoryId = scope.category.categoryId;
					scope.request.category_name = scope.category.name;
					scope.request.productId = scope.product.productId;
					scope.request.product_name = scope.product.name;
					scope.request.brandId = scope.brand.brandId;
					scope.request.brand_name = scope.brand.name;
					scope.request.modelId = scope.model.modelId;
					scope.request.model_name = scope.model.name;

					var request = clubService.sendRequest('PUT', '/item/'+scope.request.itemId, scope.request);
					request.then(function(response){
						scope.request= response;
						clubService.addNotification('request modified correctly', 'success');
					}, function(error){
						clubService.addNotification('error editing this request', 'error');
					});
				}
			};

			scope.showConfirm = function(ev, code, type){
				 // Appending dialog to document.body to cover sidenav in docs app
			   var confirm = $mdDialog.confirm()
			          .title('Do you really want delete this item ?')
			          .textContent('Please confirm your answer.')
			          .ariaLabel('Lucky day')
			          .targetEvent(ev)
			          .ok('Yes!')
			          .cancel("Cancel");

			   $mdDialog.show(confirm).then(function() {
		    		scope.deleteItem();
		    	
			    }, function() {
			      	console.log('canceled');
			    });
			};


			scope.deleteItem = function(){
				console.log('scope.item', scope.request);
				if(scope.request.itemId){
					var request = clubService.sendRequest('DELETE', '/item/'+scope.request.itemId);
					request.then(function(response){
						scope.request = null;
						scope.bContent = false;
					}, function(error){
						clubService.addNotification('error deleting the item', 'error');
					});
				}else{
					scope.request = null;
				}
			};



			scope.init();

		}


	};

}];

angular.module('app')
	.directive('userRequest', userRequest);