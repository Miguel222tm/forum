var brand = ['$state','RootService','$rootScope','$mdDialog','$timeout', function($state, clubService, $rootScope, $mdDialog, $timeout){

	return {
		restrict: 'E', 
		templateUrl: 'views/page/brand.html', 
		scope:{
			brand: '=',
			user: '='
		},
		link: function(scope, element, attrs){
			
			scope.init = function(){
				scope.bShowChild = false;
				if(scope.brand.brandId){
					scope.bShowEdit = false;
				}else{
					scope.bShowEdit = true;
				}

				if(scope.brand.active === 1){
					scope.brand.active = true;
				}else{
					scope.brand.active = false;
				}

				scope.safeBrand = angular.copy(scope.brand);
			};
			scope.loadModels = function(){
				if(!scope.brand.models){
					var request = clubService.sendRequest('GET','/brand/'+scope.brand.brandId+"/models");
					request.then(function(response){
						scope.brand.models = response;
						console.log('scope.brand.models', scope.brand.models);
					}, function(error){
						clubService.addNotification('error getting '+ scope.brand.name +' models', 'error');
					});
				}
				$timeout(function () {
			        scope.$apply(function () {
			            scope.bShowChild = true;
			        });
			    }, 300);

				console.log('bShowChild', scope.bShowChild);
			};

			scope.hideModels = function(){
				scope.bShowChild = false;
			};

			scope.showEdit = function(){
				scope.bShowEdit = true;
			};

			scope.hideEdit = function(){
				scope.bShowEdit = false;
				scope.brand = angular.copy(scope.safeBrand);
			};

			scope.save = function(){
				if(!scope.brand.brandId){
					var request = clubService.sendRequest('POST', '/brand', scope.brand);
					request.then(function(response){
						scope.brand = response;

						clubService.addNotification(scope.brand.name +' saved.', 'success');
						scope.bShowEdit = false;
						scope.safeBrand = angular.copy(scope.brand);
					}, function(error){
						clubService.addNotification('error editing '+scope.brand.name, 'error');
					});
				}else{
					scope.edit();
				}
			};

			scope.edit =  function(){
				var request = clubService.sendRequest('PUT', '/brand/'+scope.brand.brandId, scope.brand);
				request.then(function(response){
					scope.brand.name = response.name;
					scope.brand.active = response.active;
					clubService.addNotification(scope.brand.name +' edited.', 'success');
					scope.bShowEdit = false;
					scope.safeBrand = angular.copy(scope.brand);
				}, function(error){
					clubService.addNotification('error editing '+scope.brand.name, 'error');
				});
			};


			scope.showConfirm = function(ev, code, type){
			   	var confirm = $mdDialog.confirm()
			          .title('Do you really want delete '+scope.brand.name+'?')
			          .textContent('Please confirm your answer.')
			          .ariaLabel('Lucky day')
			          .targetEvent(ev)
			          .ok('Yes')
			          .cancel("Cancel");

			   $mdDialog.show(confirm).then(function() {
		    		scope.deleteBrand();
		    	
			    }, function() {
			      console.log('canceled');
			    });
		    
			};

			scope.deleteBrand = function(){
				if(scope.brand.brandId){
					var request = clubService.sendRequest('DELETE', '/brand/'+scope.brand.brandId, scope.brand);
					request.then(function(response){
						scope.brand = null;
						//removebrand();
						clubService.addNotification(response.name +' deleted.', 'success');
						scope.bShowEdit = false;
					}, function(error){
						clubService.addNotification('error editing '+scope.brand.name, 'error');
					});
				}else{
					scope.brand = null;
				}
			};

			scope.addModel = function(){
				var model = {
					brandId: scope.brand.brandId,
					name: "",
					description: "",
					active: false,	
				};
				var array = [];
				angular.forEach(scope.brand.models, function(model, key){
					if(model.modelId)
						array.push(model);
				});
				array.push(model);
				scope.brand.models = array;
			};


			scope.init();




		}
	};

}];


angular.module('app')
	.directive('brand', brand);