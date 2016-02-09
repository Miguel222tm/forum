var proInfoCourses = ['$state','settingsService',  function($state, settingsService){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/pro-info-courses.html',
		scope: {
			user: '=',
			courses: '='
		},
		link: function(scope){
			
			scope.bshow = true;
			
			scope.showContent = function (){
				return scope.bshow;
			};

			scope.setShowContent = function (){
				scope.bshow = !scope.bshow;
			};

			scope.addCourse = function (){
		
				var course = {
					jobSeekerId: scope.user.jobSeekerId,
					name: null, 
					number: null, 
					summary: null
				};
				settingsService.addJsCourse(course);
				scope.courses = settingsService.getJsCourses();
				console.log('courses', scope.courses);
			};
			

		}

	};
}];