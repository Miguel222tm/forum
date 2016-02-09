var jsCertificate = ['$state','$mdDialog','RootService', 'settingsService', function($state, $mdDialog, uuService, settingsService){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/certificates.html',
		scope: {
			user: '=',
			certificate: '='
		},
		link: function(scope){
			/**
			 * variables
			 * 'name', 'authority_name', 'number', 'start_date', 'end_date'
			 */
			scope.bContent = false;
			scope.bEdit = false;
			scope.bSave = false;
			scope.bCard = true;

			function init(){
				if(scope.certificate.jobSeekerCertificateId){
					scope.bContent = false;
					scope.bEdit = true;
					scope.bSave = false;
				}else{
					scope.bContent = true;
					scope.bSave = true;
					scope.bEdit = false;
				}
				initialValues();
				scope.safeCertificate = angular.copy(scope.certificate);
				console.log('init');
			}

			function initialValues(){
				if(scope.certificate.start_date){
					scope.certificate.start_date = formatDate(scope.certificate.start_date);
				}
				if(scope.certificate.end_date){
					scope.certificate.end_date = formatDate(scope.certificate.end_date);
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

			scope.disableSaveButton = function (){
				var b = false;
				if(scope.certificate  && scope.certificate.name && scope.certificate.authority_name && scope.certificate.start_date && scope.certificate.end_date){
					b = true;
				}
				return b;
			};

			function setFormat(){
				scope.certificate.start_date = uuService.formatDate(scope.certificate.start_date);
				scope.certificate.end_date = uuService.formatDate(scope.certificate.end_date);
			}

			scope.save = function (){
				console.log('saving');
				var request = null;
				var save = false;
				setFormat();

				var certificate = scope.certificate;
				console.log('before saving',certificate);
				if(scope.certificate.jobSeekerCertificateId){
					request = uuService.sendRequest('PUT', '/certificates/'+scope.certificate.jobSeekerCertificateId, certificate);
				}else{
					request = uuService.sendRequest('POST', '/certificates', certificate);
					save = true;
				}
				request.then(function(response){
					scope.certificate = response;
					initialValues();
					scope.safeCertificate = angular.copy(scope.certificate);
					if(save){
						settingsService.addJsCertificate(response);
					}else{
						settingsService.editJsCertificate(response);
					}

					//set view to default and notification
					scope.bSave = false;
					scope.bEdit = true;
					scope.bContent = false;
					uuService.addNotification(scope.certificate.name + ' saved.', 'success');
				}, function(error){
					uuService.addNotification('error saving ' + scope.certificate.name, 'error');
				});
			};

			scope.edit = function (){
				console.log('edit');
				scope.bContent = true;
				scope.bEdit = false;
				scope.bSave = true;
			};

			scope.cancel = function (){
				scope.certificate = angular.copy(scope.safeCertificate);
				scope.bSave = false;
				scope.bEdit = true;
				scope.bContent = false;
			};

			scope.delete = function (){
				if(scope.certificate.jobSeekerCertificateId){
					var request = uuService.sendRequest('DELETE', '/certificates/'+ scope.certificate.jobSeekerCertificateId);
					request.then( function(response){
						uuService.addNotification(scope.certificate.name + ' deleted', 'success');

						settingsService.removeJsCertificate(response);
						scope.certificate = null;
						scope.bCard = false;
					}, function(error){
						uuService.addNotification('error deleting '+scope.certificate.name, 'error');
					});
				}else{
					scope.certificate = null;
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
			          .title('Are you sure you want to delete ' + scope.certificate.name)
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