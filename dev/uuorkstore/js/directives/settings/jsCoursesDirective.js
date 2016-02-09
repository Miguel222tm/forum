var jsCourses = ['$state','$mdDialog','settingsService', 'RootService', function($state, $mdDialog, settingsService, uuService){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/courses.html',
		scope: {
			user: '=',
			course: '='
		},
		link: function(scope){

			/**
			 * variables
			 * 
			 */
			scope.bContent = false;
			scope.bEdit = false;
			scope.bSave = false;
			scope.bCard = true;

			function init(){
				if(scope.course.jobSeekerCourseId){
					scope.bContent = false;
					scope.bEdit = true;
					scope.bSave = false;
				}else{
					scope.bContent = true;
					scope.bSave = true;
					scope.bEdit = false;
				}

				scope.safeCourse = angular.copy(scope.course);
			}

			scope.disableSaveButton = function (){
				//'name', 'number', 'summary'
				var b = false;
				if(scope.course && scope.course.name && scope.course.number && scope.course.summary){
					b = true;
				}
				return b;
			};

			scope.save = function (){
				var request = null;
				var save = false;
				if(scope.course.jobSeekerCourseId){
					request = uuService.sendRequest('PUT', '/courses/'+scope.course.jobSeekerCourseId, scope.course);
				}else{
					request = uuService.sendRequest('POST', '/courses', scope.course);
					save = true;
				}
				request.then( function(response){
					scope.course = response;
					scope.safeCourse = angular.copy(scope.course);
					if(save){
						settingsService.addJsCourse(response);
					}else{
						settingsService.editJsCourse(response);
					}
					// hide options  and notification
					scope.bSave = false;
					scope.bEdit = true;
					scope.bContent = false;
					uuService.addNotification(scope.course.name+' saved', 'success');
				}, function(error){
					uuService.addNotification('error saving '+ scope.course.name, 'error');
				});
			};

			scope.edit = function (){
				console.log('edit');
				scope.bContent = true;
				scope.bEdit = false;
				scope.bSave = true;
			};

			scope.cancel  = function (){
				scope.course = angular.copy(scope.safeCourse);
				scope.bSave = false;
				scope.bEdit = true;
				scope.bContent = false;
			};

			scope.delete = function (){
				console.log('deleting', scope.course);
				if(scope.course.jobSeekerCourseId){
					var request = uuService.sendRequest('DELETE', '/courses/'+scope.course.jobSeekerCourseId);
					request.then(function(response){
						uuService.addNotification(scope.course.name +' deleted', 'success');
						scope.course = null;
						settingsService.removeJsCourse(response);
						scope.bCard = false;
					}, function(error){
						uuService.addNotification('error deleting ' +scope.course.name);
					});
				}else{
					console.log('scope.course with out id', scope.course);
					scope.course = null;
					scope.bCard = false;
				}

			};

			/**
			 * [confirmDelete - it will show a dialog and it will ask the user to confirm the delete option and it will trigger the scope.delete() method.
			 * @param  {event} ev [dialog event]
			 * @return {boolean}    confirm [return the user confirmation]
			 * @author Miguel Trevino
			 */
			scope.confirmDelete = function(ev) {
			    var confirm = $mdDialog.confirm()
			          .title('Are you sure you want to delete ' + scope.course.name+'?')
			          .textContent('Click Yes to DELETE')
			          .ariaLabel('Lucky day')
			          .targetEvent(ev)
			          .ok('Yes')
			          .cancel('Cancel');
			    $mdDialog.show(confirm).then(function() {
			    	scope.delete();
			    }, function() {
			      
			    });
			};

			init();
		}
	};
}];