var vendorProduct = ['$state','RootService','vendorService', '$mdDialog', '$timeout', function($state, clubService, vendorService, $mdDialog, $timeout){
	return{
		restrict: 'E',
		templateUrl: 'views/partials/vendor-product.html',
		scope: {
			product: '=',
			user: '='
		},
		link: function(scope, element, attrs){

			scope.bOCategory  = false;
			scope.bOProduct = false;
			scope.bOBrand = false;
			scope.bOModel = false;

			scope.bContent = false;
			scope.init = function(){
				if(scope.product.productId){
					scope.bContent = false;
				}else{
					scope.bContent = true;
				}
				scope.safeProduct = angular.copy(scope.product);
			};


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
					scope.product.category_name = null;
					scope.product.product_name = null;
					scope.product.brand_name = null;
					scope.product.model_name = null;
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
					scope.product.product_name = null;
					scope.product.brand_name = null;
					scope.product.model_name = null;
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
					scope.product.brand_name = null;
					scope.product.model_name = null;
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
					scope.product.model_name = null;
				}
			};


			scope.save = function(){

			};

			scope.cancel = function (){
				scope.bContent = false;
				scope.product = angular.copy(scope.safeProduct);

				console.log('product cancel', scope.product);
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
				var request = clubService.sendRequest('DELETE', '/product/'+scope.product.productId);
				request.then(function(response){
					vendorService.removeProduct(response);
					scope.product = null;
					scope.bContent = false;
				}, function(error){
					clubService.addNotification('error deleting the product', 'error');
				});
			};



			scope.init();


		}


	};



}];


angular.module('app')
	.directive('vendorProduct', vendorProduct);