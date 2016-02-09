var settingsProfile = ['$state','moment','RootService', function($state, moment, $uuService){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/profile.html',
		scope: {
			user: '='
		},
		link: function(scope){
			scope.localUser = scope.user;

			scope.titles = ["Mr.","Sr.","Dr", "Ms." , "Mrs." , "Miss"];
			/**
			 * init method, set the user for the first time.
			 * 
			 */
			scope.init = function (){
				if (scope.localUser.date_of_birth === "0000-00-00" ) {
					scope.localUser.date_of_birth = null;
				}else{
					scope.localUser.date_of_birth  = new Date(scope.localUser.date_of_birth.slice(0,4), scope.localUser.date_of_birth.slice(5,7)-1, scope.localUser.date_of_birth.slice(8,10));
				}	
				if (scope.localUser.available_for_hire === 1) {
					scope.localUser.available_for_hire = true;
				}else{
					scope.localUser.available_for_hire = false;
				}
				scope.safeUser = angular.copy(scope.localUser);
			};


			/**
			 * Save Profile
			 * @return {object} [if its saved correctly will return the new user object, otherwise will return an error message ]
			 */
			scope.saveProfile = function (){
				scope.localUser.name = scope.localUser.firstName + " " + scope.localUser.lastName;

				if(scope.localUser.date_of_birth !== null){
					scope.localUser.date_of_birth = $uuService.formatDate(scope.localUser.date_of_birth);
					console.log('fecha', scope.localUser.date_of_birth);
				}

				if (scope.user.jobSeekerId) {
					scope.baseUrl = '/job-seeker/';
					scope.id = scope.user.jobSeekerId;
				}
				else if (scope.user.humanResourcesManagerId) {
					scope.baseUrl = '/human-resources-manager/';
					scope.id = scope.user.humanResourcesManagerId;
				}
				else if (scope.user.companyId){
					scope.baseUrl = '/company/';
					scope.id = scope.user.companyId;
				}
				var request = $uuService.sendRequest('PUT', scope.baseUrl+scope.id, scope.localUser);

				request.then (function (response){
					console.log('response', response);
					scope.localUser = response;
					scope.setSaving(false);
					scope.safeUser = response;
					scope.addNotification("Saved correctly.");
				}, function(error){
					console.log('error', error);
					scope.addNotification('Error saving, try again.');
				});

			};
			/**
			 * Show Save Options is a get Method, that will return a boolean.
			 * @return {[boolean]} [boolean to compare if the fields have to be disabled or not]
			 */
			scope.showSaveOptions = function (){
				return scope.saving;
			};
			/**
			 * [setSaving is a method to set a boolean value to scope.saving in order to trigger the ng-disabled on the html]
			 * @param {[boolean]} s [boolean value for scope.saving ]
			 */
			scope.setSaving = function(s){
				scope.saving  = s;
			};
			/**
			 * reset method will put the original values that you had before 
			 * @return {[type]} [description]
			 */
			scope.reset = function (){
				scope.setSaving(false);				
				scope.localUser = angular.copy(scope.safeUser);
				//console.log('scope.use', scope.localUser);
			};

			scope.addNotification = function(notification){
        		$uuService.addNotification(notification);
    		};
			scope.init();

		}

	};
}];