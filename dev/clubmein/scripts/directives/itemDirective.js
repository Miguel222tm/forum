var item = ['$state','RootService','MembersService','$rootScope','$mdDialog','$timeout', function($state, clubService, membersService, $rootScope, $mdDialog, $timeout){
	return {
		restrict: 'E',
		templateUrl: 'views/partials/item.html', 
		scope: { 
			item: '=',
			items: '=',
			categories: '=',
			user: '=',
		},
		controller: itemsCtrl,
		link: function(scope, controller){
			//console.log('item: ', scope.item);
			scope.country;
			scope.state;
			scope.products = [];
			scope.bOCategory  = false;
			scope.bOProduct = false;
			scope.bOBrand = false;
			scope.bOModel = false;

			scope.bContent = false;
			scope.safeItem;

			scope.init= function(){
				scope.safeItem = angular.copy(scope.item);
				if(scope.item.itemId){
					
					scope.bContent = false;
					
				}else{
					scope.bContent = true;
				}
				if(scope.item.itemId === 'clubIn')
					scope.bContent = true;
			};

			scope.loadBids = function(){
				if(!scope.bids){
					var request = clubService.sendRequest('GET', '/item/'+scope.item.itemId+'/bids');
					request.then(function(response){
						console.log('bids ---- ', response);
						scope.bids = response;
						scope.bBidsSection = true;
					}, function(error){
						clubService.sendRequest('error getting bids', 'error');
					});
				}
			}

			scope.addOther = function(parent, type){
				var array = [];
				angular.forEach(parent, function(element, key){
					if(type === 'category' && element.categoryId){
						array.push(element);
					}
					if(type === 'product' && element.productId){
						array.push(element);
					}
					if(type === 'brand' && element.brandId){
						array.push(element);
					}
					if(type === 'model' && element.modelId){
						array.push(element);
					}
				});
				var nuevo = {name:"Other", active: 1};
				array.push(nuevo);
				console.log('array ',type );
				return array;
			};

			scope.setCategory = function(cat){
				
				scope.category=cat;		
				console.log('scope.category!', scope.category);
				if(scope.category){
					
					if(!scope.category.categoryId){
						scope.bOCategory = true;
						scope.bOProduct = true;
						scope.bOBrand = true;
						scope.bOModel = true;
					}else{
						/// add other to the list
						scope.category.products = scope.addOther(scope.category.products, 'product');
						scope.bOCategory = false;
						scope.bOProduct = false;
						scope.bOBrand = false;
						scope.bOModel = false;
					}
					scope.item.category_name = null;
					scope.item.product_name = null;
					scope.item.brand_name = null;
					scope.item.model_name = null;
					scope.product = null;
					scope.brand = null;
					scope.model = null;
				}	

			};

			scope.setProduct = function(product){
				scope.product = product;
				console.log('product', scope.product);
				if(scope.product){
					if(!scope.product.productId){
						scope.bOProduct = true;
						scope.bOBrand = true;
						scope.bOModel = true;
					}else{
						scope.product.brands= scope.addOther(scope.product.brands, 'brand');
						scope.bOProduct = false;
						scope.bOBrand = false;
						scope.bOModel = false;
					}
					//clean item names
					scope.item.product_name = null;
					scope.item.brand_name = null;
					scope.item.model_name = null;
					scope.brand = null;
					scope.model = null;
				}


			};

			scope.setBrand = function(brand){
				scope.brand = brand;
				console.log(scope.brand);
				if(scope.brand){
					if(!scope.brand.brandId){
						scope.bOBrand = true;
						scope.bOModel = true;
					}else{
						scope.brand.models= scope.addOther(scope.brand.models, 'model');
						scope.bOBrand = false;
						scope.bOModel = false;
					}
					scope.item.brand_name = null;
					scope.item.model_name = null;
					scope.model = null;
				}
			};

			scope.setModel = function(model){
				scope.model = model;
				console.log('modelo', scope.model);
				if(scope.model){
					if(scope.model.modelId){
						scope.bOModel = false;
					}else{
						scope.bOModel = true;
					}
					scope.item.model_name = null;
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

			scope.save = function(){
				
				var bSave = false;
				//console.log(allFieldsCompleted() , scope.category , scope.category.categoryId , scope.product , scope.product.productId , scope.brand , scope.brand.brandId , scope.model , scope.model.modelId);
				if(allFieldsCompleted() && scope.category && scope.category.categoryId && scope.product && scope.product.productId && scope.brand && scope.brand.brandId && scope.model && scope.model.modelId)
				{
					scope.item.categoryId = scope.category.categoryId;
					scope.item.productId = scope.product.productId;
					scope.item.brandId = scope.brand.brandId;
					scope.item.modelId = scope.model.modelId;
					scope.item.category_name = scope.category.name;
					scope.item.product_name = scope.product.name;
					scope.item.brand_name = scope.brand.name;
					scope.item.model_name = scope.model.name;
					console.log('item ready to be saved', scope.item);
					scope.item.active = true;
					bSave = true;
				}else if( allFieldsCompleted() && scope.item.itemId === 'clubIn'){
					bSave = true;
				}
				else if(allFieldsCompleted() && (scope.bOCategory || scope.bOProduct || scope.bOBrand || scope.bOModel) ){
					if(scope.category){
						if(scope.category.categoryId)
							scope.item.categoryId = scope.category.categoryId;
						if(scope.category.name)
							scope.item.category_name = scope.category.name;
					}
					if(scope.product){
						if(scope.product.productId)
							scope.item.productId = scope.product.productId;
						if(scope.product.name)
							scope.item.product_name = scope.product.name;
					}
					if(scope.brand){
						if(scope.brand.brandId)
							scope.item.brandId = scope.brand.brandId;
						if(scope.brand.name)
							scope.item.brand_name = scope.brand.name;
					}
					if(scope.model){
						if(scope.model.modelId)
							scope.item.modelId = scope.model.modelId;
						if(scope.model.name)
							scope.item.model_name = scope.model.name;
					}

					scope.item.active = false;
					console.log('item request!', scope.item);
					bSave = true;
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
				if(bSave){
					if(scope.isItemRepeated(scope.item)){
						clubService.addNotification('You cannot add a repeated item', 'error');
					}else{

						scope.item.memberId = $rootScope.currentUser.memberId;
						scope.bContent = false;
						var request = clubService.sendRequest('POST', '/item', scope.item);
						request.then(function(response){
							
							scope.item.itemId= response.itemId;
							scope.item.location = response.location;
							scope.safeItem.itemId = response.itemId;
							scope.safeItem.location = response.location;
							clubService.addNotification('added item successfully', 'success');
							scope.bContent = false;
						}, function(error){
							clubService.addNotification('error adding item', 'error');
						});
					}
				}else{
					clubService.addNotification('Please fill all the fields');
				}
				
				
			};

			scope.isItemRepeated = function(item){
				var booleano = false;
				scope.allItems = membersService.getItems();
				console.log('all items', scope.allItems);
				angular.forEach(scope.allItems, function(arrayItem, key){
					if(arrayItem.itemId && arrayItem.brand_name === item.brand_name && arrayItem.model_name ===  item.model_name)
						booleano = true;
				});
				return booleano;
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
				if(scope.item.price > 0 && scope.item.quantity > 0 ){
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