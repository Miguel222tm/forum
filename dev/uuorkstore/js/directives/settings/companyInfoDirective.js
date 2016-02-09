var companyInfo = ['$state','RootService', 'settingsService', function($state, uuService, settingsService){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/company-info-directive.html',
		scope: {
			user: '='
		},
		link: function(scope){
				
			console.log('company-information');
			
			/**
			 * variables
			 * 
			 */
			

			function init(){
				scope.bEdit = true;
				scope.bSave = false;
				scope.safeUser = angular.copy(scope.user);
			}

			scope.disableSaveButton = function(){
				return angular.equals(scope.user, scope.safeUser);
			};


			scope.save = function(){
				if(!angular.equals(scope.user, scope.safeUser)){
					var request = uuService.sendRequest('PUT', '/company/'+scope.user.companyId, scope.user);

					request.then(function(response){

						scope.user = response;
						scope.safeUser = angular.copy(scope.user);

						//notification and disable fields
						uuService.addNotification('company information updated successfully', 'success');
						scope.bEdit = true;
						scope.bSave = false;
					}, function(error){
						uuService.addNotification('error updating your company information', 'error');
					});
				}else{
					scope.bEdit = true;
					scope.bSave = false;
				}
			};





			scope.edit = function(){
				scope.bEdit = false;
				scope.bSave = true;
			};

			scope.cancel = function(){
				scope.bEdit = true;
				scope.bSave = false;
				scope.user = angular.copy(scope.safeUser);

			};


			init();


			


		}

	};
}];