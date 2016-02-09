var jsLanguage = ['$state','$timeout','RootService','$mdDialog','settingsService', function($state, $timeout, uuService, $mdDialog, settingsService){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/language.html',
		scope: {
			user: '=',
			language: '=',
			constants: '=',
		},
		link: function(scope){
			//variables
			scope.bContent = false;
			scope.bEdit = false;
			scope.bSave = false;
			scope.bCard = true;
			scope.profiencyLevels = [];
			var searchFilterTimeout;
			var filterText ="";

			scope.init = function (){
				if(scope.language.jobSeekerLanguageId){
					scope.bContent = false;
					scope.bEdit = true;
					scope.bSave = false;
				}else{
					scope.bContent = true;
					scope.bSave = true;
					scope.bEdit = false;
				}
				scope.safeLanguage = angular.copy(scope.language);
				scope.languagesFound = [];
				setProfiencyLevels();
			};

			function setProfiencyLevels(){
				scope.profiencyLevels = [
					'Elementary proficiency',
					'Limited working proficiency',
					'Professional working proficiency',
					'Full professional proficiency',
					'Native or bilingual proficiency'
				];
			}

			
			/**
			 * [getLanguage get the language you are filtering for]
			 * @author Miguel Trevino
			 */
			scope.getLanguage = function(){
				if(searchFilterTimeout) 
					$timeout.cancel(searchFilterTimeout);

				filterText = "";
				searchFilterTimeout = $timeout(function() {
					if(scope.language.description){
						filterText = scope.language.description;
						findLanguage(filterText);
					}else{
						scope.languagesFound = [];
						filterText = "";
						//scope.language = angular.copy(scope.safeLanguage);
					}
				}, 500);

			};

			function findLanguage(filterText){
				var b = false;
				var description = null;
				scope.languagesFound = [];
				filterText = filterText.toLowerCase();
				angular.forEach(scope.constants, function(language, key){
					description = language.description.toLowerCase();
					if(description.match(filterText)){
						scope.languagesFound.push(language);
						b = true;
					}
				});
				if(b === false){
					console.log('language not found' );

				}else{
					console.log('list of results:', scope.languagesFound);
				}
			}

			scope.selectLanguage = function (language){
				console.log('language selected',language);
				scope.language = angular.copy(language);
				if(scope.safeLanguage.jobSeekerLanguageId){
					scope.language.jobSeekerLanguageId = scope.safeLanguage.jobSeekerLanguageId;
					scope.language.jobSeekerId = scope.safeLanguage.jobSeekerId;
					scope.language.level = scope.safeLanguage.level;
				}

				scope.languagesFound = [];
				filterText = "";
			};

			scope.disableSaveButton = function (){
				var b = false;
				if(scope.language.description && scope.language.level && scope.language.code && isALanguage()){
					b = true;
				}
				return b;
			};

			function isALanguage (){
				var b = false;
				angular.forEach(scope.constants, function(cLan, key){
					if(cLan.description === scope.language.description)
						b = true;
				});
				return b;
			}

			scope.save = function (){
				var request = null;
				scope.language.jobSeekerId = scope.user.jobSeekerId;
				var save = false;
				if(!isRepeatedLanguage()){
					if(scope.language.jobSeekerLanguageId){
						request = uuService.sendRequest('PUT','/languages/'+scope.language.jobSeekerLanguageId, scope.language);
					}else{
						request = uuService.sendRequest('POST','/languages', scope.language);
						save = true;
					}
					request.then(function (response){
						console.log('saved',response);
						scope.language = response;
						scope.safeLanguage = angular.copy(scope.language);
						if(save){
							settingsService.addJsLanguage(response);
						}else{
							settingsService.editJsLanguage(response);
						}
						// hide options  and notification
						scope.bSave = false;
						scope.bEdit = true;
						scope.bContent = false;
						uuService.addNotification(scope.language.description +' saved.', 'success');
					}, function (error){
						uuService.addNotification('error saving '+ scope.language.description);
					});
				}else{
					uuService.addNotification('You already have '+scope.language.description + ' in your languages', 'error');
				}
				

			};

			function isRepeatedLanguage(){
				var languages = settingsService.getJsLanguages();
				var b = false;
				angular.forEach(languages, function(lan, key){
					if(lan.jobSeekerLanguageId && lan.languageId === scope.language.languageId && lan.jobSeekerLanguageId !== scope.language.jobSeekerLanguageId){
						b = true;
					}
				});
				return b;
			}

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
			 * Cancel method will return the scope.language to its default value, changes will be destroyed.
			 * @author Miguel Trevino
			 */
			scope.cancel = function(){
				scope.language = angular.copy(scope.safeLanguage);
				scope.bSave = false;
				scope.bEdit = true;
				scope.bContent = false;
			};

			scope.delete = function (){
				if(scope.language.jobSeekerLanguageId){
					var request = uuService.sendRequest('DELETE', '/languages/'+scope.language.jobSeekerLanguageId);
					request.then( function (response){
						uuService.addNotification(scope.language.description+ ' deleted.', 'success');
						scope.language = null;
						settingsService.removeJsLanguage(response);
						scope.bCard = false;
					}, function(error){
						uuService.addNotification('error deleting '+ scope.language.description, 'error');
					});
				}else{
					scope.language = null;	
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
			          .title('Are you sure you want to delete ' + scope.language.description+'?')
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


			scope.init();



		}
	};
}];