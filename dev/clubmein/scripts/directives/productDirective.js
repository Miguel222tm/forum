var product = ['$state','RootService','$rootScope','$mdDialog','$timeout', function($state, clubService, $rootScope, $mdDialog, $timeout){

	return {
		restrict: 'E', 
		templateUrl: 'views/page/product.html', 
		scope:{
			product: '=',
			user: '='
		},
		link: function(scope, element, attrs){
			//console.log('hello product!', scope.product);
			scope.init = function(){
				scope.bShowChild = false;
				if(scope.product.productId){
					scope.bShowEdit = false;
				}else{
					scope.bShowEdit = true;
				}

				if(scope.product.active === 1){
					scope.product.active = true;
				}else{
					scope.product.active = false;
				}

				scope.safeProduct = angular.copy(scope.product);
			};
			scope.loadBrands = function(){
				if(!scope.product.brands){
					var request = clubService.sendRequest('GET','/product/'+scope.product.productId+"/brands");
					request.then(function(response){
						scope.product.brands = response;
						console.log('scope.product.brands', scope.product.brands);
					}, function(error){
						clubService.addNotification('error getting '+ scope.product.name +' brands', 'error');
					});
				}

				$timeout(function () {
			        scope.$apply(function () {
			            scope.bShowChild = true;
			        });
			    }, 300);

				console.log('bShowChild', scope.bShowChild);
			};

			scope.hideBrands = function(){
				scope.bShowChild = false;
			};

			scope.showEdit = function(){
				scope.bShowEdit = true;
			};

			scope.hideEdit = function(){
				scope.bShowEdit = false;
				scope.product = angular.copy(scope.safeProduct);
			};


			scope.save = function(){
				if(!scope.product.productId){
					var request = clubService.sendRequest('POST', '/product', scope.product);
					request.then(function(response){
						scope.product = response;

						clubService.addNotification(scope.product.name +' saved.', 'success');
						scope.bShowEdit = false;
						scope.safeProduct = angular.copy(scope.product);
					}, function(error){
						clubService.addNotification('error editing '+scope.product.name, 'error');
					});
				}else{
					scope.edit();
				}
			};

			scope.edit =  function(){
				var request = clubService.sendRequest('PUT', '/product/'+scope.product.productId, scope.product);
				request.then(function(response){
					scope.product.name = response.name;
					scope.product.active = response.active;
					clubService.addNotification(scope.product.name +' edited.', 'success');
					scope.bShowEdit = false;
					scope.safeProduct = angular.copy(scope.product);
				}, function(error){
					clubService.addNotification('error editing '+scope.product.name, 'error');
				});
			};


			scope.showConfirm = function(ev, code, type){
			   	var confirm = $mdDialog.confirm()
			          .title('Do you really want delete '+scope.product.name+'?')
			          .textContent('Please confirm your answer.')
			          .ariaLabel('Lucky day')
			          .targetEvent(ev)
			          .ok('Yes')
			          .cancel("Cancel");

			   $mdDialog.show(confirm).then(function() {
		    		scope.deleteProduct();
		    	
			    }, function() {
			      console.log('canceled');
			    });
		    
			};

			scope.deleteProduct = function(){
				if(scope.product.productId){
					var request = clubService.sendRequest('DELETE', '/product/'+scope.product.productId, scope.product);
					request.then(function(response){
						scope.product = null;
						//removeProduct();
						clubService.addNotification(response.name +' deleted.', 'success');
						scope.bShowEdit = false;
					}, function(error){
						clubService.addNotification('error editing '+scope.product.name, 'error');
					});
				}else{
					scope.product = null;
				}
			};


			scope.addBrand = function(){
				var brand = {
					productId: scope.product.productId,
					name: "",
					active: false,	
				};
				var array = [];
				angular.forEach(scope.product.brands, function(brand, key){
					if(brand.brandId)
						array.push(brand);
				});
				array.push(brand);
				scope.product.brands = array;
			};

			scope.init();




		}
	};

}];


angular.module('app')
	.directive('product', product);