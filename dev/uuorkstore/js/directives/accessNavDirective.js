var accessNav = ['$state', function($state){
	return{
    	restrict: 'E',
		templateUrl: 'views/partials/access-nav.html',
		scope: {
			user: '='
		}, 
		link: function(scope){
			scope.menu = [];
			scope.submenu =[];
			scope.topMenu =[];

			angular.forEach(scope.user.functionalities, function(func, key){
				switch(func.code){
						
					case "fn_home":
					scope.menu.push({
						hierarchy: 1,
						level: 0,
						hidden: false,
						icon: 'fa fa-home',
						label: 'Home',
						state: 'app.home'
					});	
					break;
					case "fn_search":
					scope.menu.push({
						hierarchy: 2,
						level: 0,
						hidden: false,
						icon: 'fa fa-search',
						label: 'Search',
						state: 'app.search'
					});
					break;
					case "fn_profile":
						scope.topMenu.push({
							hierarchy: 1,
							level: 0,
							hidden: false,
							icon: 'icon mdi-action-perm-contact-cal i-20',
							label: 'Profile',
							state: 'app.profile'
						});
						break;
					case "fn_settings":
						scope.topMenu.push({
							hierarchy: 2, 
							level : 0,
							hidden: false,
							icon: 'icon mdi-action-settings i-20',
							label: 'Settings',
							state: 'app.settings'
						});
						break;
					case "fn_help":
						scope.topMenu.push({
							hierarchy: 3,
							level: 0,
							hidden: false,
							icon: 'icon mdi-action-settings i-20',
							label: 'Help',
							state: 'app.help'
						});
						break;

				}
				if(scope.user.access_level === 1){
					switch(func.code){
	
						case "fn_job_offers":
						scope.menu.push({
							hierarchy: 3,
							level: 0,
							hidden: false,
							icon: 'fa fa-paper-plane',
							label: 'Job Offers',
							state: 'app.offers'
						});
						break;
						case "fn_my_jobs":
						scope.menu.push({
							hierarchy: 4,
							level: 0,
							submenus: true,
							hidden: false,
							icon: 'fa fa-briefcase',
							label: 'My jobs',
							state: 'app.myjobs',
							active: false,
						});
						break;
						case "fn_my_jobs_favorites":
						scope.submenu.push({
							hierarchy:4,
							level: 1,
							hidden: false,
							icon: 'fa fa-star',
							label: 'Favorites',
							state: 'app.favorites'
						});
						break;
						case "fn_my_jobs_last_visited":
						scope.submenu.push({
							hierarchy: 4,
							level: 2,
							hidden: false,
							icon: 'fa fa-eye',
							label: 'Last visited',
							state: 'app.lastvisited'
						});
						break;
						case "fn_my_jobs_applied":
						scope.submenu.push({
							hierarchy: 4,
							level: 3,
							hidden: false,
							icon: 'fa fa-check-circle',
							label: 'Applied',
							state: 'app.applied'
						});
						break;
						case "fn_my_jobs_on_process":
						scope.submenu.push({
							hierarchy: 4,
							level: 4,
							hidden: false,
							icon: 'fa fa-tasks',
							label: 'On process',
							state: 'app.onprocess'
						});
						break;
						case "fn_my_jobs_interviewed":
						scope.submenu.push({
							hierarchy: 4,
							level: 5,
							hidden: false,
							icon: 'fa fa-video-camera',
							label: 'Interviewed',
							state: 'app.interviewed'
						});
						break;
						case "fn_my_jobs_finished":
						scope.submenu.push({
							hierarchy: 4,
							level: 6,
							hidden: false,
							icon: 'fa fa-th-list',
							label: 'Completed',
							state: 'app.completed'
						});
						break;
						case "fn_my_jobs_deleted":
						scope.submenu.push({
							hierarchy: 4, 
							level: 7,
							hidden: false,
							icon: 'fa fa-trash',
							label: 'Deleted',
							state: 'app.deleted'
						});
						break;
						case "fn_people":
						scope.menu.push({
							hierarchy: 5,
							level: 0,
							hidden: false,
							icon: 'fa fa-users',
							label: 'Connections',
							state: 'app.people'
						});
						break;
						
						case "fn_profile_personal_information":
						scope.topMenu.push({
							hierarchy: 1,
							level:1,
							hidden: true,
							icon: '',
							label: 'Personal Information',
							state: 'app.personalinformation'
						});
						break;
						case "fn_profile_resume":
						scope.topMenu.push({
							hierarchy: 1, 
							level: 2, 
							hidden: true,
							icon: '',
							label: 'Resume',
							state: 'app.resume'
						});
						break;
						
						
					}
				}
				/*=======================================
				=            human resources && admins           =
				=======================================*/			
				if(scope.user.access_level === 2 || scope.user.access_level === 3){
					switch(func.code){
						
						case "fn_job_offers":
							scope.menu.push({
								hierarchy: 3,
								level: 0,
								hidden: false,
								icon: 'fa fa-paper-plane',
								label: 'Job Offers',
								state: 'app.offers'
							});
							break;
						case "fn_people":
							scope.menu.push({
								hierarchy: 4,
								level: 0,
								hidden: false,
								icon: 'fa fa-users',
								label: 'Connections',
								state: 'app.people'
							});
							break;
						case "fn_hr_job_vacancies":
							scope.menu.push({
								hierarchy: 5,
								level: 0,
								submenus: true,
								hidden: false,
								icon: 'fa fa-book',
								label: 'Job vacancies',
								state: 'app.jobVacancies'
							});
							break;
						case "fn_hr_job_vacancies_new":
							scope.submenu.push({
								hierarchy: 5,
								level: 1,
								hidden: false,
								label: 'New',
								state: 'app.jobVacanciesNew'
							});
							break;
						case "fn_hr_job_vacancies_saved":
							scope.submenu.push({
								hierarchy: 5,
								level: 2,
								hidden: false,
								label: 'Saved',
								state: 'app.jobVacanciesSaved'
							});
							break;
						case "fn_hr_job_vacancies_active":
							scope.submenu.push({
								hierarchy: 5,
								level: 3,
								hidden: false,
								label: 'Active',
								state: 'app.jobVacanciesActive'
							});
							break;
						case "fn_hr_job_vacancies_queue":
							scope.submenu.push({
								hierarchy: 5,
								level: 4,
								hidden: false,
								label: 'Queue',
								state: 'app.jobVacanciesQueue'
							});
							break;
						case "fn_hr_job_vacancies_completed":
							scope.submenu.push({
								hierarchy: 5,
								level: 5,
								hidden: false,
								label: 'Completed',
								state: 'app.jobVacanciesDeleted'
							});
							break;
						case "fn_hr_job_vacancies_deleted":
							scope.submenu.push({
								hierarchy: 5,
								level: 6,
								hidden: false,
								label: 'Deleted',
								state: 'app.jobVacanciesDeleted'
							});
							break;
						case "fn_interview_area":
							scope.menu.push({
								hierarchy: 6,
								level: 0,
								submenus: true,
								hidden: false,
								icon: 'fa fa-video-camera',
								label: 'Interview',
								state: 'app.interviewArea'
							});
							break;
						case "fn_interview_area_schedule":
							scope.submenu.push({
								hierarchy: 6,
								level: 1,
								hidden: false,
								label: 'Schedule',
								state: 'app.interviewAreaSchedule'
							});
							break;
						case "fn_interview_area_interview":
							scope.submenu.push({
								hierarchy: 6,
								level: 2,
								hidden: false,
								label: 'Interview',
								state: 'app.interviewAreaInterview'
							});
							break;

					}
				}
				if(scope.user.access_level === 3){
					switch(func.code){
						
						case "fn_members":
							scope.menu.push({
								hierarchy: 7,
								level: 0,
								submenus: true,
								hidden: false,
								icon: 'fa fa-sitemap',
								label: 'Members',
								state: 'app.members'
							});
							break;
						case "fn_members_administrator":
							scope.submenu.push({
								hierarchy: 7,
								level: 1,
								hidden: false,
								label: 'Admins',
								state: 'app.membersAdmins'
							});
							break;
						case "fn_members_hr_managers":
							scope.submenu.push({
								hierarchy: 7,
								level: 2,
								hidden: false,
								label: 'H.R Managers',
								state: 'app.membersHRManagers'
							});
							break;
						case "fn_members_employees":
							scope.submenu.push({
								hierarchy: 7,
								level: 3,
								hidden: false,
								label: 'Admins',
								state: 'app.membersEmployees'
							});
							break;
					}
				}

			});
			//console.log('menu', scope.menu);

		}

	};	
}];