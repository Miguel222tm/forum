var jsEducation = ['$state','RootService','$mdDialog','settingsService', function($state, uuService, $mdDialog, settingsService){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/js-education.html',
		scope: {
			user: '=',
			education: '='
		},
		link: function(scope){
			
			//console.log('education', scope.education);
			/**
			 * variables
			 * 
			 */
			scope.bContent = false;
			scope.bEdit = false;
			scope.bSave = false;
			scope.bCard = true;
			/**
			 * init values, set all the default configuration for a education directive
			 * @author Miguel Trevino
			 */
			function init(){
				
				//show buttons/content
				if(scope.education.jobSeekerEducationId){
					scope.bContent = false;
					scope.bEdit = true;
					scope.bSave = false;
				}else{
					scope.bContent = true;
					scope.bSave = true;
					scope.bEdit = false;
				}
				initialValues();
				scope.safeEducation = angular.copy(scope.education);
				
			}

			/**
			 * it gives the date a date object format, instead of only a string
			 * @param  {[string]} date [string]
			 * @return {[Date]}      [returns a date object]
			 */
			function formatDate(date){
				var dateFormated = new Date(date.slice(0,4), date.slice(5,7)-1, date.slice(8,10));
				return dateFormated;
			}
			/**
			 * [initialValues set a format for dates and boolean]
			 * @author Miguel Trevino
			 */
			function initialValues(){		
				if(scope.education.start_date){
					scope.education.start_date  = formatDate(scope.education.start_date);
				}
				 
				if(scope.education.end_date){
					scope.education.end_date  = formatDate(scope.education.end_date);
				}
				if(scope.education.is_current === 1){
					scope.education.is_current = true;
					scope.education.end_date = null;
				}else if (scope.education.is_current === 0){
					scope.education.is_current = false;
				}
			}
			/**
			 * [setFormat - set a moment format (external library)]
			 * @author Miguel Trevino
			 */
			function setFormat(){
				scope.education.start_date = uuService.formatDate(scope.education.start_date);
				if(scope.education.is_current === true){
					delete scope.education.end_date;
				}else{
					scope.education.end_date = uuService.formatDate(scope.education.end_date);
				}
			}
			/**
			 * This method checks if you have all the required fields to click the save button
			 * @return {boolean} [returns true if you can save, otherwise returns false]
			 * @author Miguel Trevino
			 */
			scope.disableSaveButton = function(){
				var b = false;
				if(scope.education && scope.education.field_of_study && scope.education.school_name && scope.education.jobSeekerId && scope.education.degree && scope.education.start_date && ( scope.education.end_date || scope.education.is_current ) && !scope.bEdit){
					scope.bSave = true;
					b = true;
				}
				return b;
			};

			/**
			 * Save method, checks if you have an educationId, if you have it , then it will send a put request, otherwise it will send a post one to store it for the first time
			 * @author Miguel Trevino
			 */
			scope.save = function (){
				console.log('saving');
				var request = null;	
				setFormat();
				var education = scope.education;
				var save = false;
				if(scope.education.jobSeekerEducationId){
					request = uuService.sendRequest('PUT', '/education/'+scope.education.jobSeekerEducationId, education);
				}else{
					request = uuService.sendRequest('POST', '/education', education);
					save = true;
				}				
				request.then(function(response){
					scope.education = response;
					initialValues();
					scope.safeEducation = angular.copy(scope.education);
					if(save){
						settingsService.addJsEducation(response);
					}else{
						settingsService.editJsEducation(response);
					}

					//set view to default and notification
					scope.bSave = false;
					scope.bEdit = true;
					scope.bContent = false;
					uuService.addNotification(education.school_name +' saved.');
				}, function(error){
					uuService.addNotification('error saving '+education.school_name);
				});
				
			};

			
			/**
			 * edit function will open the content div and show the save/cancel button
			 * @author Miguel Trevino
			 */
			scope.edit = function (){
				console.log('edit');
				scope.bContent = true;
				scope.bEdit = false;
				scope.bSave = true;
			};
			/**
			 * Cancel method will return the scope.education to its default value, changes will be destroyed.
			 * @author Miguel Trevino
			 */
			scope.cancel = function(){
				scope.education = angular.copy(scope.safeEducation);
				scope.bSave = false;
				scope.bEdit = true;
				scope.bContent = false;
			};

			/**
			 * delete method  - will delete the education object.
			 * @return {object} [it will return a response with an education object or an error]
			 * @author Miguel Trevino
			 */
			scope.delete = function(){
				if(scope.education.jobSeekerEducationId){
					var request = uuService.sendRequest('DELETE', '/education/'+scope.education.jobSeekerEducationId);
					request.then(function (response){
						uuService.addNotification(scope.education.school_name+ ' deleted.');
						settingsService.removeJsEducation(response);
						scope.education = null;	
						scope.bCard = false;
						
					}, function(error){
						uuService.addNotification('error deleting '+scope.education.school_name);
					});
				}else{
					scope.education = null;	
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
			    // Appending dialog to document.body to cover sidenav in docs app
			    var confirm = $mdDialog.confirm()
			          .title('Are you sure you want to delete ' + scope.education.school_name)
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

			//initialize init();
			init();
		}


	};
}];