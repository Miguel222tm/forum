var jsVolunteer = ['$state','$mdDialog','settingsService', 'RootService', function($state, $mdDialog, settingsService, uuService){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/volunteer.html',
		scope: {
			user: '=',
			volunteer: '='

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
				if(scope.volunteer.jobSeekerVolunteerId){
					scope.bContent = false;
					scope.bEdit = true;
					scope.bSave = false;
				}else{
					scope.bContent = true;
					scope.bSave = true;
					scope.bEdit = false;
				}

				scope.safeVolunteer = angular.copy(scope.volunteer);
			}

			scope.disableSaveButton = function (){
				var b = false;
				//'role', 'organization_name', 'cause'
				if(scope.volunteer && scope.volunteer.role && scope.volunteer.organization_name && scope.volunteer.cause){
					b = true;
				}
				return b;
			};

			scope.save = function (){
				var rquest = null;
				var save = false;

				if(scope.volunteer.jobSeekerVolunteerId){
					request = uuService.sendRequest('PUT', '/volunteers/'+scope.volunteer.jobSeekerVolunteerId, scope.volunteer);
				}else{
					request = uuService.sendRequest('POST', '/volunteers', scope.volunteer);
					save = true;
				}
				request.then( function (response){
					scope.volunteer = response;
					scope.safeVolunteer = angular.copy(scope.volunteer);
					if(save){
						settingsService.addJsVolunteer(response);
					}else{
						settingsService.editJsVolunteer(response);
					}
					// hide options  and notification
					scope.bSave = false;
					scope.bEdit = true;
					scope.bContent = false;
					uuService.addNotification(scope.volunteer.role+' saved', 'success');
				}, function(error){
					uuService.addNotification('error saving '+ scope.volunteer.role, 'error');
				});
			};

			scope.edit = function (){
				console.log('edit');
				scope.bContent = true;
				scope.bEdit = false;
				scope.bSave = true;
			};

			scope.cancel = function (){
				scope.volunteer = angular.copy(scope.safeVolunteer);
				scope.bSave = false;
				scope.bEdit = true;
				scope.bContent = false;
			};

			scope.delete = function (){
				console.log('deleting ', scope.volunteer);
				if(scope.volunteer.jobSeekerVolunteerId){
					var request = uuService.sendRequest('DELETE',  '/volunteers/'+scope.volunteer.jobSeekerVolunteerId);
					request.then( function(response){
						uuService.addNotification(scope.volunteer.role + ' deleted', 'success');

						scope.volunteer = null;
						settingsService.removeJsVolunteer(response);
						scope.bCard = false;

					}, function(error){
						uuService.addNotification('error deleting '+ scope.volunteer.role, 'error');
					});
				}else{
					console.log('scope.volunteer with out id', scope.volunteer);
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
			          .title('Are you sure you want to delete ' + scope.volunteer.role+'?')
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