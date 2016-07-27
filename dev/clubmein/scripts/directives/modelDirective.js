var model = ['$state','RootService','$rootScope','$mdDialog', function($state, clubService, $rootScope, $mdDialog){

	return {
		restrict: 'E', 
		templateUrl: 'views/page/model.html', 
		scope:{
			model: '=',
			user: '='
		},
		link: function(scope, element, attrs){
			
			scope.init = function(){
				scope.bShowChild = false;
				if(scope.model.modelId){
					scope.bShowEdit = false;
				}else{
					scope.bShowEdit = true;
				}

				if(scope.model.active === 1){
					scope.model.active = true;
				}else{
					scope.model.active = false;
				}

				scope.safeModel = angular.copy(scope.model);
			};
			
			scope.showEdit = function(){
				scope.bShowEdit = true;
			};

			scope.hideEdit = function(){
				scope.bShowEdit = false;
				scope.model = angular.copy(scope.safeModel);
			};

			scope.save = function(){
				if(!scope.model.modelId){
					var request = clubService.sendRequest('POST', '/model', scope.model);
					request.then(function(response){
						scope.model = response;

						clubService.addNotification(scope.model.name +' saved.', 'success');
						scope.bShowEdit = false;
						scope.safeModel = angular.copy(scope.model);
					}, function(error){
						clubService.addNotification('error editing '+scope.model.name, 'error');
					});
				}else{
					scope.edit();
				}
			};

			scope.edit =  function(){
				var request = clubService.sendRequest('PUT', '/model/'+scope.model.modelId, scope.model);
				request.then(function(response){
					scope.model.name = response.name;
					scope.model.active = response.active;
					clubService.addNotification(scope.model.name +' edited.', 'success');
					scope.bShowEdit = false;
					scope.safeModel = angular.copy(scope.model);
				}, function(error){
					clubService.addNotification('error editing '+scope.model.name, 'error');
				});
			};

			scope.showConfirm = function(ev, code, type){
			   	var confirm = $mdDialog.confirm()
			          .title('Do you really want delete '+scope.model.name+'?')
			          .textContent('Please confirm your answer.')
			          .ariaLabel('Lucky day')
			          .targetEvent(ev)
			          .ok('Yes')
			          .cancel("Cancel");

			   $mdDialog.show(confirm).then(function() {
		    		scope.deleteModel();
		    	
			    }, function() {
			      console.log('canceled');
			    });
		    
			};

			scope.deleteModel = function(){
				if(scope.model.modelId){
					var request = clubService.sendRequest('DELETE', '/model/'+scope.model.modelId, scope.model);
					request.then(function(response){
						scope.model = null;
						//removemodel();
						clubService.addNotification(response.name +' deleted.', 'success');
						scope.bShowEdit = false;
					}, function(error){
						clubService.addNotification('error editing '+scope.model.name, 'error');
					});
				}else{
					scope.model = null;
				}
			};

			scope.init();




		}
	};

}];


angular.module('app')
	.directive('model', model);