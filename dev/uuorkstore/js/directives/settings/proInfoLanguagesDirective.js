var proInfoLanguages = ['$state','RootService','settingsService', function($state, uuService, settingsService){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/pro-info-languages.html',
		scope: {
			user: '=',
			languages: '='
		},
		link: function(scope){
			
			scope.bshow = true;
			scope.constantLanguages = [];
			scope.init = function (){
				if(settingsService.getLanguages()){
					scope.constantLanguages = settingsService.getLanguages();
					//console.log(' languages already on service' );
				}else{
			 		getLanguages();
			 		//console.log(' languages from the database');
				}
			};

			function getLanguages(){
				var request = null;
				request = uuService.sendRequest('GET', '/constant/languages');
				request.then(function(response){
					settingsService.setLanguages(response);
					scope.constantLanguages = settingsService.getLanguages();
					//console.log('languages', response);
				}, function(error){
					uuService.addNotification('error getting languages');
				});

			}
			scope.addLanguages = function (){
				var lan =  {
					jobSeekerId: scope.user.jobSeekerId,
					languageId: 0,
					level: "", 
					description: "",
					code: ""
				};
				settingsService.addJsLanguage(lan);
				scope.languages = settingsService.getJsLanguages();
				console.log('languages', scope.languages);
			};


			scope.showContent = function (){
				return scope.bshow;
			};

			scope.setShowContent = function (){
				scope.bshow = !scope.bshow;
			};
			

			scope.init();
			

		}

	};
}];