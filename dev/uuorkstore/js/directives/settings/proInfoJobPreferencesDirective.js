var proInfoJobPreferences = ['$state', function($state){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/pro-info-job-preferences.html',
		scope: {
			user: '='
		},
		link: function(scope){
			
			console.log('pro-info-job-preferences');
			
			scope.bshow = false;
			
			scope.showContent = function (){
				return scope.bshow;
			};

			scope.setShowContent = function (){
				scope.bshow = !scope.bshow;
			};
			

		}

	};
}];