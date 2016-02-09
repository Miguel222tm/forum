var settingsCompanyInfo = ['$state','settingsService', 'RootService', function($state, settingsService, uuService){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/company-information.html',
		scope: {
			user: '='
		},
		link: function(scope){
				
			console.log('company-information');
				
			function init() {
				if(scope.user.humanResourcesManagerId){
					scope.companies = [];
					getHRMCompanies();
				}
			}


			function getHRMCompanies(){
				if(settingsService.getHRMCompanies()){
					scope.companies = settingsService.getHRMCompanies();
				}else{
					var request = uuService.sendRequest('GET', '/human-resources-manager/companies');
					request.then( function(response){

						scope.companies = angular.copy(response);
						settingsService.setHRMCompanies(response);
						
					}, function(error){
						uuService.addNotification('error getting companies relationships', 'error');
					});
				}
			}	

			init();

		}

	};
}];