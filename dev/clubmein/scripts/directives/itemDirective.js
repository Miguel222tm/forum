var item = ['$state','RootService','MembersService','$rootScope','$mdDialog', function($state, clubService, membersService, $rootScope, $mdDialog){
	return {
		restrict: 'E',
		templateUrl: 'views/partials/item.html', 
		scope: { 
			item: '=',
			items: '=',
			categories: '=',
		},
		controller: itemsCtrl,
		link: function(scope, controller){
			//console.log('item: ', scope.item);
			scope.country;
			scope.state;
			scope.category;
			scope.products = [];
			scope.other;
			scope.bContent = false;
			scope.safeItem;

			scope.init= function(){
				scope.safeItem = angular.copy(scope.item);
				if(scope.item.itemId){
					
					scope.bContent = false;
					
				}else{
					scope.bContent = true;
				}

			};

			scope.setCategory = function(cat){
				scope.category = cat;
				//console.log('cat', cat);
				if(scope.category && scope.category.categoryId){
					scope.category.other = false;
					scope.item.categoryId = scope.category.categoryId;
					scope.item.category_name = scope.category.name;

					scope.item.productId = null;
					scope.item.product_name = null;

					//console.log('scope.item::::', scope.item);
					var request = clubService.sendRequest('GET', '/category/'+scope.item.categoryId+'/products');
					request.then( function(response){
						scope.products = response;
						//console.log('products ', response);
						scope.products.push({name: 'Other', code: 'otr'});
					}, function(){
					 	clubService.addNotification('error getting the products', 'error');
					});
				}
				if(scope.category && !scope.category.categoryId){
					scope.item.categoryId = null;
					scope.item.category_name = scope.category.name;

					scope.item.productId = null;
					scope.item.product_name = null;
					scope.category.other = true;
					scope.products = [];
				}
							
			};

			scope.setProduct = function(product){
				scope.product = product;
				if(scope.product && scope.product.productId){
					
					//console.log('scope.category in products', scope.category);
					scope.product.other = false;
					scope.item.productId = angular.copy(scope.product.productId);
					scope.item.product_name = angular.copy(scope.product.name);
					//console.log('product id', scope.item.productId);

					var request = clubService.sendRequest('GET', '/product/'+scope.item.productId+'/brands');	
					request.then(function(response){
						scope.brands = response;
						scope.brands.push({name: 'Other'});
						scope.product.other = false;
						//console.log('brands', scope.brands);
					}, function(error){
						clubService.addNotification('error getting the brands');
					});
				}
				if(scope.product && !scope.productId){
					scope.item.product_name = scope.product.name;
					scope.item.productId = null;
					scope.item.brandId =null;
					scope.item.brand_name = null;

					scope.product.other = true;
				}

			};

			scope.setBrand = function(brand){
				scope.brand  = brand;
				if(scope.brand  && scope.brand.brandId){
					scope.brand.other = false;
					scope.item.productId = scope.brand.productId;
					scope.item.brandId = scope.brand.brandId;
					scope.item.brand_name = scope.brand.name;

					var request = clubService.sendRequest('GET', '/brand/'+scope.item.brandId+'/models');
					request.then(function(response){
						scope.models = response;
						//console.log('scope.models', scope.models);
						scope.models.push({name: 'Other'});
					}, function(error){
						clubService.addNotification('error getting models', 'error');
					});
				}
				if(scope.brand && !scope.brand.brandId){
					scope.brand.other = true;
					scope.item.brand_name = scope.brand.name;
					scope.item.brandId = null;

					scope.item.modelId = null;
					scope.item.model_name = null;
				}
			};

			scope.setModel = function(model){
				scope.model = model;
				//console.log('scope.model', scope.model);

				if(scope.model && scope.model.modelId){
					scope.item.modelId = scope.model.modelId;
					scope.item.model_name = scope.model.name;
					scope.model.other = false;
					//console.log('model', scope.item.modelId);
				}
				if(scope.model  && !scope.model.modelId){
					scope.item.modelId  = null;
					scope.model.other = true;
				}
			};

			scope.setCountry = function(country){
				scope.country = country;
			};
			scope.setState = function(state){
				scope.state = state;
			};
			scope.setCity = function(city){
				scope.city = city;
			};

			scope.edit = function (){
				if(scope.item.otherLocation && scope.country && scope.state && scope.city){
					scope.location  = {
						itemLocationId: scope.item.location[1].itemLocationId,
						country: scope.country,
						state: scope.state,
						city: scope.city
					};
					scope.item.modifyLocation = scope.location;
				}
				var request = clubService.sendRequest('PUT', '/item/'+scope.item.itemId, scope.item);
				request.then(function(response){

					scope.item = response;
					console.log('edited!', response);
					clubService.addNotification('item saved correctly', 'success');
					scope.bContent = false;
				}, function(error){
					clubService.addNotification('error');
				});
			};

			scope.save = function (){
				console.log('item to save', scope.item);
				if(allFieldsCompleted() && scope.item.categoryId && scope.item.productId && scope.item.brandId && scope.item.modelId){
					scope.item.active = true;
				}
				if(allFieldsCompleted() && (!scope.item.categoryId || !scope.item.productId || !scope.item.brandId || !scope.item.modelId)){
					scope.item.active = false;
				}

				if(scope.item.otherLocation && scope.country && scope.state && scope.city){
					console.log('added other location');
					scope.location  = {
						country: scope.country,
						state: scope.state,
						city: scope.city
					};
					scope.item.location = scope.location;
				}

				scope.item.memberId = $rootScope.currentUser.memberId;
				scope.bContent = false;
				var request = clubService.sendRequest('POST', '/item', scope.item);
				request.then(function(response){
					
					scope.item.itemId= response.itemId;
					scope.item.location = response.location;
					scope.safeItem.itemId = response.itemId;
					scope.safeItem.location = response.location;
					scope.edit();

					clubService.addNotification('added item successfully', 'success');
				}, function(error){
					clubService.addNotification('error adding item', 'error');
				});	
				
			};

			scope.cancel = function (){
				scope.bContent = false;
				scope.item = angular.copy(scope.safeItem);

				console.log('item cancel', scope.item);
			};

			scope.showContent = function(){
				scope.bContent = true;
				console.log('bContent', scope.bContent);
			};

			function allFieldsCompleted(){
				var booleano = false;
				if(scope.item.brand_name && scope.item.category_name && scope.item.model_name && scope.item.price > 0 && scope.item.quantity > 0 && scope.item.product_name){
					booleano = true;
				}
				return booleano;
			}

			scope.otherLocation = function(){
				scope.item.otherLocation != scope.item.otherlocation;
				//console.log('scope.item.otherLocation', scope.item.otherLocation);
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
				var request = clubService.sendRequest('DELETE', '/item/'+scope.item.itemId);
				request.then(function(response){
					membersService.removeItem(response);
					scope.item = null;
					scope.bContent = false;
				}, function(error){
					clubService.addNotification('error deleting the item', 'error');
				});
			};

			
			scope.init();
		}

	};
	
}];


angular.module('app')
	.directive('item', item);