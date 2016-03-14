var vendorProduct = ['$state','RootService','vendorService', '$mdDialog', '$timeout', function($state, clubService, vendorService, $mdDialog, $timeout){
	return{
		restrict: 'E',
		templateUrl: 'views/partials/vendor-product.html',
		scope: {
			vproduct: '=',
			products: '=',
			user: '=', 
			categories: '='
		},
		link: function(scope, element, attrs){
			scope.bOCategory  = false;
			scope.bOProduct = false;
			scope.bOBrand = false;
			scope.bOModel = false;

			scope.bContent = false;

			scope.init = function(){
				if(scope.vproduct.productId){
					scope.bContent = false;
				}else{
					scope.bContent = true;
				}
				scope.safeProduct = angular.copy(scope.vproduct);
			};


			scope.addOther = function(parent, type){
				var array = [];
				if(type === 'model'){
					array.push({modelId: "All", name: 'All', active: 1});
				}
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
					scope.vproduct.category_name = null;
					scope.vproduct.product_name = null;
					scope.vproduct.brand_name = null;
					scope.vproduct.model_name = null;
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
					//clean product names
					scope.vproduct.product_name = null;
					scope.vproduct.brand_name = null;
					scope.vproduct.model_name = null;
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
					scope.vproduct.brand_name = null;
					scope.vproduct.model_name = null;
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
					scope.vproduct.model_name = null;
				}
			};


			scope.save = function(){
				var bSave = false;
				// console.log('category', scope.category, 'product', scope.product, 'brand', scope.brand, 'mdoel', scope.model);
				if(scope.category && scope.product && scope.brand && scope.model){
					// item without
					scope.vproduct.categoryId = scope.category.categoryId;
					scope.vproduct.productId = scope.product.productId;
					scope.vproduct.brandId = scope.brand.brandId;
					scope.vproduct.modelId = scope.model.modelId;
					scope.vproduct.category_name = scope.category.name;
					scope.vproduct.product_name = scope.product.name;
					scope.vproduct.brand_name = scope.brand.name;
					scope.vproduct.model_name = scope.model.name;
					scope.vproduct.active = true;
					bSave = true;	
				}
				else if((scope.bOCategory || scope.bOProduct || scope.bOBrand || scope.bOModel)){
					if(scope.category){
						if(scope.category.categoryId)
							scope.vproduct.categoryId = scope.category.categoryId;
						if(scope.category.name)
							scope.vproduct.category_name = scope.category.name;
					}
					if(scope.product){
						if(scope.product.productId)
							scope.vproduct.productId = scope.product.productId;
						if(scope.product.name)
							scope.vproduct.product_name = scope.product.name;
					}
					if(scope.brand){
						if(scope.brand.brandId)
							scope.vproduct.brandId = scope.brand.brandId;
						if(scope.brand.name)
							scope.vproduct.brand_name = scope.brand.name;
					}
					if(scope.model){
						if(scope.model.modelId)
							scope.vproduct.modelId = scope.model.modelId;
						if(scope.model.name)
							scope.vproduct.model_name = scope.model.name;
					}

					scope.vproduct.active = false;
					if(scope.vproduct.category_name && scope.vproduct.product_name && scope.vproduct.brand_name && scope.vproduct.model_name){
						bSave = true;
					}
				}
				if(bSave){
					if(scope.isRepeatedProduct(scope.vproduct)){
						clubService.addNotification('sorry, you already have this product in your list', 'error');
					}else{
						scope.vproduct.vendorId = scope.user.vendorId;
						var request = clubService.sendRequest('POST', '/vendor/product', scope.vproduct);
						request.then(function(response){
							if(!response.length){
								scope.vproduct = null;
								clubService.addNotification('cannot add more models with the  settings you selected');
							}
							if(scope.vproduct.modelId === "All"){
								console.log('response from save All', response);
								scope.products = response;
							}else{
								scope.vproduct.vendorProductId = response.vendorProductId;
							}
							//scope.safeProduct = scope.vproduct;
							scope.bContent = false;
							clubService.addNotification('product saved' , 'success');

						}, function(error){
							clubService.addNotification('error saving your product', 'error');
						});
					}
				}else{
					clubService.addNotification('please fill all the fields');
				}
			};

			scope.isRepeatedProduct = function(product){
				var booleano = false;
				scope.allProducts = vendorService.getProducts();
				console.log('all products', scope.allProducts);
				angular.forEach(scope.allProducts, function(pro, key){
					if(pro.vendorProductId && pro.model_name === product.model_name){
						console.log('match! pro', pro.model_name, 'product ', product.model_name);
						booleano = true;
					}
				});
				return booleano;
			};

			scope.cancel = function (){
				scope.bContent = false;
				scope.vproduct = angular.copy(scope.safeProduct);

				console.log('product cancel', scope.vproduct);
			};


			scope.showConfirm = function(ev, code, type){
				 // Appending dialog to document.body to cover sidenav in docs app
			   var confirm = $mdDialog.confirm()
			          .title('Do you really want delete this product ?')
			          .textContent('Please confirm your answer.')
			          .ariaLabel('Lucky day')
			          .targetEvent(ev)
			          .ok('Yes!')
			          .cancel("Cancel");

			   $mdDialog.show(confirm).then(function() {
		    		scope.deleteProduct();
		    	
			    }, function() {
			      console.log('canceled');
			    });
		    
			};

			scope.deleteProduct = function(){
				if(scope.vproduct.vendorProductId){
					var request = clubService.sendRequest('DELETE', '/vendor/product/'+scope.vproduct.vendorProductId);
					request.then(function(response){
						vendorService.removeProduct(response);
						scope.vproduct = null;
						scope.bContent = false;

					}, function(error){
						clubService.addNotification('error deleting the product', 'error');
					});
				}else{
					scope.vproduct = null;
					scope.bContent = false;
				}
			};


			

			scope.init();


		}


	};



}];


angular.module('app')
	.directive('vendorProduct', vendorProduct);