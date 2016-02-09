var jsPrevExp = ['$state','$mdDialog','RootService', 'settingsService', function($state, $mdDialog, uuService, settingsService){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/previous-experience.html',
		scope: {
			user: '=',
			previous: '='
		},
		link: function(scope){
			/**
			 * variables
			 *
			 * 'jobSeekerId', 'job_title', 'company', 'initial_date', 'end_date', 'is_current', 'country', 'state', 'city', 'summary'
			 */
			scope.bContent = false;
			scope.bEdit = false;
			scope.bSave = false;
			scope.bCard = true;

			function init(){
				if(scope.previous.previousExperienceId){
					scope.bContent = false;
					scope.bEdit = true;
					scope.bSave = false;
				}else{
					scope.bContent = true;
					scope.bSave = true;
					scope.bEdit = false;
				}
				initialValues();
				scope.safePrevious = angular.copy(scope.previous);

			}


			function initialValues (){
				//initial_date / end_date
				if(scope.previous.initial_date){
					scope.previous.initial_date = formatDate(scope.previous.initial_date);
				}
				if(scope.previous.end_date){
					scope.previous.end_date = formatDate(scope.previous.end_date);
				}
				if(scope.previous.is_current === 1){
					scope.previous.is_current = true;
					scope.previous.end_date = null;
				}else if (scope.previous.is_current === 0){
					scope.previous.is_current = false;
				}

			}

			/**
			 * it returns the date a date object format, instead of only a string
			 * @param  {[string]} date [string]
			 * @return {[Date]}      [returns a date object]
			 */
			function formatDate(date){
				var dateFormated = new Date(date.slice(0,4), date.slice(5,7)-1, date.slice(8,10));
				return dateFormated;
			}

			/**
			 * This method checks if you have all the required fields to click the save button
			 * @return {boolean} [returns true if you can save, otherwise returns false]
			 * @author Miguel Trevino
			 */
			scope.disableSaveButton = function (){
				var b = false;
				if(scope.previous && scope.previous.job_title && scope.previous.company && scope.previous.initial_date && (scope.previous.end_date || scope.previous.is_current)){
					scope.bSave = true;
					b= true;
				}
				return b;
			};

			/**
			 * [setFormat - set a moment format (external library)]
			 * @author Miguel Trevino
			 */
			function setFormat(){
				scope.previous.initial_date = uuService.formatDate(scope.previous.initial_date);
				
				if(scope.previous.is_current === true){
					delete scope.previous.end_date;
				}else{
					scope.previous.end_date = uuService.formatDate(scope.previous.end_date);
				}
			}

			scope.save = function (){
				console.log('saving');
				var request = null;
				var save = false;
				setFormat();
				var previous = scope.previous;
				console.log('before saving check it', previous);
				if(scope.previous.previousExperienceId){
					request = uuService.sendRequest('PUT', '/previous-experience/'+scope.previous.previousExperienceId, previous);
				}else{
					request = uuService.sendRequest('POST', '/previous-experience', previous);
					save = true;
				}
				request.then(function(response){
					scope.previous = response;
					initialValues();
					scope.safePrevious = angular.copy(scope.previous);
					if(save){
						settingsService.addPreviousExperience(response);
					}else{
						settingsService.editPreviousExperience(response);
					}
					//set view to default and notification
					scope.bSave = false;
					scope.bEdit = true;
					scope.bContent = false;
					uuService.addNotification(previous.job_title +' saved.', 'success');
				}, function(error){
					uuService.addNotification('error saving '+previous.job_title, 'error');
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
				scope.previous = angular.copy(scope.safePrevious);
				scope.bSave = false;
				scope.bEdit = true;
				scope.bContent = false;
			};

			scope.delete = function(){
				if(scope.previous.previousExperienceId){
					var request  = uuService.sendRequest('DELETE', '/previous-experience/'+scope.previous.previousExperienceId);
					request.then(function(response){
						uuService.addNotification(scope.previous.job_title + ' deleted', 'success');

						settingsService.removePreviousExperience(response);

						scope.previous = null;
						scope.bCard = false;
					}, function(error){
						uuService.addNotification('error deleting '+scope.previous.job_title, 'error');
					});
				}else{
					scope.previous = null;
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
			          .title('Are you sure you want to delete ' + scope.previous.job_title)
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