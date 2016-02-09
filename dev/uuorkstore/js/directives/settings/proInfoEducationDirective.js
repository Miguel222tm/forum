var proInfoEducation = ['$state','RootService','settingsService', function($state, uuService, settingsService){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/pro-info-education.html',
		scope: {
			user: '=',
			education: '='
		},
		link: function(scope){
			
			scope.bshow = true;
			
			scope.showContent = function (){
				return scope.bshow;
			};

			scope.setShowContent = function (){
				scope.bshow = !scope.bshow;
			};

			scope.addEducation = function (){
				var edu = {
					jobSeekerId: scope.user.jobSeekerId,
					school_name: "",
					field_of_study: "",
					start_date: "",
					end_date: "",
					is_current: "",
					degree: "",
					activities: "",
					notes: ""
				};
				settingsService.addJsEducation(edu);
				scope.education = settingsService.getJsEducation();
				console.log('educations', scope.education);
			};
			

		}

	};
}];