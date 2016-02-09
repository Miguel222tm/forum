var proInfoVolunteers = ['$state','settingsService', function($state, settingsService){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/pro-info-volunteers.html',
		scope: {
			user: '=',
			volunteers: '='
		},
		link: function(scope){
			
			scope.bshow = true;
			
			scope.showContent = function (){
				return scope.bshow;
			};

			scope.setShowContent = function (){
				scope.bshow = !scope.bshow;
			};

			scope.addVolunteer = function (){
				var vol = {
					jobSeekerId: scope.user.jobSeekerId,
					role: null, 
					organization_name: null, 
					cause: null
				};
				settingsService.addJsVolunteer(vol);
				scope.volunteers = settingsService.getJsVolunteers();
				console.log('scope.volunteers', scope.volunteers);

			};
			

		}

	};
}];