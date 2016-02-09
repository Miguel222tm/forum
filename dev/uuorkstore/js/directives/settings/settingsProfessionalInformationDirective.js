var settingsProInfo = ['$state', 'RootService', 'settingsService', function($state, uuService, settingsService){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/professional-information.html',
		scope: {
			user: '='
		},
		link: function(scope){

			scope.init = function(){
				console.log('init');
				var request = uuService.sendRequest('GET','/job-seeker/profile');
				request.then( function(response){
					
					settingsService.setUserSettingsInfo(response);
					scope.resumes = response.resumes;
					scope.education = scope.defaultResponse(response.education, 'education');
					scope.languages = scope.defaultResponse(response.languages, 'languages');
					scope.previousExperience = scope.defaultResponse(response.previousExperience, 'previous');
					scope.certificates = scope.defaultResponse(response.certificates, 'certificates');
					scope.courses = scope.defaultResponse(response.courses, 'courses');
					scope.volunteers = scope.defaultResponse(response.volunteers, 'volunteers');

					console.log('profile data:: ', response);

					//set on the service;
					settingsService.setJsLanguages(scope.languages);
					settingsService.setJsEducation(scope.education);
					settingsService.setPreviousExperience(scope.previousExperience);
					settingsService.setJsCourses(scope.courses);
					settingsService.setJsCertificates(scope.certificates);
					settingsService.setJsVolunteers(scope.volunteers);

					//set values to 
				}, function(error){
					uuService.addNotification('error getting profile');
				});
			};

			scope.defaultResponse = function(response, type){
				var first = {};
				if(response.length === 0){
					switch(type){
						case 'education':
							first = {
								jobSeekerId: scope.user.jobSeekerId,
								school_name: null,
								field_of_study: null,
								start_date: null,
								end_date: null,
								is_current: false,
								degree: "",
								activities: "",
								notes: ""
							};							
							
						break;
						case 'languages':
							first =  {
								jobSeekerId: scope.user.jobSeekerId,
								languageId: null,
								level: null,
								description: null,
								code: null
							};
							break;
						case 'previous': 
							first =  {
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
							break;
						case 'certificates':
							first = {
								jobSeekerId: scope.user.jobSeekerId,
								name: null, 
								authority_name: null,
								number: null, 
								start_date: null, 
								end_date: null
							};
							break;
						case 'courses':
							first = {
								jobSeekerId: scope.user.jobSeekerId,
								name: null, 
								number: null, 
								summary: null
							};
							break;
						case 'volunteers':
							first = {
								jobSeekerId: scope.user.jobSeekerId,
								role: null, 
								organization_name: null, 
								cause: null
							};							
							break;
					}				
					response.push(first);
				}
				return response;
			};

			scope.init();

		}

	};
}];