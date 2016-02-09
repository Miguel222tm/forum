var settingsSkills = ['$state','settingsService', 'RootService', function($state, settingsService, uuService){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/skills.html',
		scope: {
			user: '='
		},
		link: function(scope){
			/**
			 * variables
			 */
    		scope.readonly = false;
		    scope.selectedItem = null;
		    scope.searchText = null;
		    scope.querySearch = querySearch;
		    scope.dbSkills = null;
		    scope.skills = null;
		    scope.autocompleteDemoRequireMatch = false;
		    scope.transformChip = transformChip;

		    function init (){
		    	loadSkills();
		    	jsSkills();
		    }

			/**
		     * Return the proper object when the append is called.
		     */
		    function transformChip(chip) {
		      	// If it is an object, it's already a known chip
		      	if (angular.isObject(chip)) {
		      		//console.log('already an object!');
		       		return chip;
		      	}
		      	// Otherwise, create a new one
		      	//console.log('new chip');
		      	scope.newSkill({ tag_name: chip, skillId: 'new'});
		      	return { tag_name: chip, skillId: 'new'};
		    }

				    /**
		     * Search for skill.
		     */
		    function querySearch(query) {
		      	var results = query ? scope.dbSkills.filter(createFilterFor(query)) : [];
		      	return results;
		    }

			/**
		    * Create filter function for a query string
		    * @author Miguel Trevino
		    */
		    function createFilterFor(query) {
		      	var lowercaseQuery = angular.lowercase(query);

		      	return function filterFn(skill) {
		      		var lower = angular.lowercase(skill.tag_name);
		        	if (lower.indexOf(lowercaseQuery) === 0)
		        		return skill.tag_name;
		      };
		    }

		    /**
		     * [loadSkills - load all the skills on the database]
		     * @author Miguel Trevino
		     */
		    function loadSkills() {
		    	if(settingsService.getSkills()){
		    		scope.dbSkills = settingsService.getSkills();
		    	}else{
		    		var request = uuService.sendRequest('GET', '/constant/skills');
		    		request.then(function(response){
		    			/*scope.skills = response;*/
		    			scope.dbSkills = response;
		    			//console.log('skills',response);
		    			settingsService.setSkills(response);
		    			return response;

		    		}, function(error){
		    			uuService.addNotification('error getting the database skills', 'error');
		    		});
		    	}

		    }
		    /**
		     * [jsSkills - get the list of skills that a job seeker has]
		     * @author Miguel Trevino
		     */
		    function jsSkills(){
		    	if(!settingsService.getJsSkills()){
		    		var request = uuService.sendRequest('GET',  '/skills');
		    		request.then(function (response){
		    			scope.skills = angular.copy(response);
		    			//console.log('js skills', response);
		    			settingsService.setJsSkills(response);
		    		}, function(error){
		    			uuService.addNotification('error getting your skills', 'error');
		    		});
		    	}else{
		    		//scope.skills = angular.copy(settingsService.getJsSkills());
		    	}		    	
		    }

		    scope.newSkill = function(skill) {
		    	//console.log('new skill', skill);
		    	/*scope.skills.push(skill);*/
		    };


		    /**
			 * Show Save Options is a get Method, that will return a boolean.
			 * @return {[boolean]} [boolean to compare if the fields have to be disabled or not]
			 * @author Miguel Trevino
			 */
			scope.showSaveOptions = function (){
				return scope.saving;
			};
			/**
			 * [setSaving is a method to set a boolean value to scope.saving in order to trigger the ng-disabled on the html]
			 * @param {[boolean]} s [boolean value for scope.saving ]
			 * @author Miguel Trevino
			 */
			scope.setSaving = function(s){
				scope.saving  = s;
			};

			/**
			 * reset method will put the original values that you had before 
			 * @return {[type]} [description]
			 * @author Miguel Trevino
			 */
			scope.reset = function (){
				scope.setSaving(false);				
				
			};

			/**
			 * [save - will save the elements ready to save and also the elements ready to be deleted]
			 * @return {[array]} [Will return an array with the js skills]
			 * @author Miguel Trevino
			 */
			scope.save = function(){
				scope.savingSkills = updateSkillsList();
				var request = null;
				if(scope.savingSkills.nuevos.length > 0){
					request = uuService.sendRequest('POST', '/skills', scope.savingSkills.nuevos);
					request.then(function(response){
						scope.skills = angular.copy(response);
						settingsService.setJsSkills(response);
						uuService.addNotification('skills updated correctly.', 'success');
					},function(error){
						uuService.addNotification('error updating your skills', 'error');
					});
				}
				if(scope.savingSkills.delet.length > 0 ){
					var data= {
						params: scope.savingSkills.delet
					};
					request = uuService.sendRequest('DELETE', '/skills/ids', data);
					request.then( function(response){
						scope.skills = angular.copy(response);
						settingsService.setJsSkills(response);
						uuService.addNotification('skills updated correctly.', 'success');
					}, function(error){
						uuService.addNotification('error updating your skills', 'error');
					});
				}
				scope.setSaving(false);
				
				
			};

			/**
			 * [updateSkillsList - will get two arrays, new skills and skills to delete]
			 * @return {[array]} [returns an array with the elements ready to update.]
			 * @author Miguel Trevino
			 */
			function updateSkillsList(){
				var array  = {
					nuevos: [],
					delet: []
				};
				/**
				 * loop to find the new elements that need to be added to the db.
				 */
				angular.forEach(scope.skills, function(skill, key){
					if(!skill.jobSeekerSkillId){
						skill.jobSeekerId = scope.user.jobSeekerId;
						array.nuevos.push(skill);
					}
				});
				/**
				 *  loop to find the elements that need to be deleted.
				 */
				angular.forEach(settingsService.getJsSkills(), function(jsSkill, key){
					var response = findDeletedSkills(jsSkill);
					if(!response){
						array.delet.push(jsSkill.jobSeekerSkillId);
					}
				});
				// return the array with new and delete collection of elements.
				return array;
			}
			/**
			 * [findDeletedSkills - will find the skills that are not in the list anymore.]
			 * @param  {[object]} skill []
			 * @return {[boolean]}   booleano [will return true if the element still on the list, otherwise false]
			 * @author Miguel Trevino
			 */
			function findDeletedSkills(skill){
				var booleano = false;
				angular.forEach(scope.skills, function(jsSkill, key){
					if(skill.jobSeekerSkillId === jsSkill.jobSeekerSkillId){
						booleano = true;
					}
				});
				return booleano;
			}


			init();

		

		}

	};
}];