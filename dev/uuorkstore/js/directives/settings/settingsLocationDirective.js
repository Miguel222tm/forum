var settingsLocation = ['$state','RootService','settingsService', function($state, uuService, settingsService){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/location.html',
		scope: {
			user: '='
		},
		link: function(scope){
				
			console.log('location');
			scope.saving = false;
			scope.locations = null;
			/*
			country_code: "af"
			locationId: 1
			name: "Africa"
			 */
			scope.init = function (){

				scope.getLocations();
				
			};


			scope.getLocations = function ()
			{
				if (settingsService.getLocations()) {
					scope.locations = settingsService.getLocations();

				}else{
					var request;
					request = uuService.sendRequest('GET', '/locations');
					request.then(function (response){
						//console.log('response', response);
						scope.locations = response;
						settingsService.setLocations(response);
					}, function(error){
						uuService.addNotification("error loading locations");
					});
				}
			};

			scope.init();


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
			
			scope.reset = function (){
				scope.saving = false;
			};

			scope.save = function() {
				scope.saving = false;

				//save code;
			};

		}

	};
}];