var proInfoPreviousExperience = ['$state','settingsService',  function($state, settingsService){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/pro-info-previous-experience.html',
		scope: {
			user: '=',
			previous: '='
		},
		link: function(scope){
			
			scope.bshow = true;
			
			scope.showContent = function (){
				return scope.bshow;
			};

			scope.setShowContent = function (){
				scope.bshow = !scope.bshow;
			};

			scope.addPreviousExperience = function (){
				console.log('previous exp', scope.previous);
				var pre =  {
					jobSeekerId: scope.user.jobSeekerId,
					job_title: null,
					company: null,
					initial_date: null, 
					end_date: null,
					is_current: false,
					country: "", 
					state: "", 
					city: "", 
					summary: ""
				};
				settingsService.addPreviousExperience(pre);
				scope.previous = settingsService.getPreviousExperience();
				console.log('previous experience', scope.previous);
			};
			

		}

	};
}];