var settingsService = ['$http', '$q', function ($http, $q){
	/**
	 * [variables]
	 */
	this.constants = null;
	this.locations = null;
	this.settingsInfo = null;
	this.languages = null;
	this.jsLanguages = null;
	this.previousExperience = null;
	this.jsCourses = null;
	this.jsCertificates = null;
	this.jsVolunteers = null;
	this.skills = null;
	this.jsSkills = null;
	this.HRMCompanies = null;

	/**
	 * [setLocations - save the list of locations]
	 * @param {array} obj [list of location objects]
	 * @author Miguel Trevino
	 */
	this.setLocations = function (obj){
		this.locations = obj;

	};
	/**
	 * [getLocations - get the list of locations]
	 * @return {array} locations [list]
	 * @author Miguel Trevino
	 */
	this.getLocations = function (){
		return this.locations;
	};
	/**
	 * [setUserSettingsInfo - set the settings from the user logged in]
	 * @param {array} si [settings information]
	 * @author Miguel Trevino
	 */
	this.setUserSettingsInfo = function(si){
		this.settingsInfo = si;
	};
	/**
	 * [getUserSettingsInfo - get the whole array of settings from the user logged in]
	 * @return {array} [ user settings information]
	 * @author Miguel Trevino
	 */
	this.getUserSettingsInfo = function(){
		return this.settingsInfo;
	};
	/**
	 * [setLanguages - save the list of languages (constants) on the service]
	 * @param {array} languages [list of languages]
	 * @author Miguel Trevino
	 */
	this.setLanguages =  function (languages){
		this.languages = languages;
	};
	/**
	 * [getLanguages - get the list of languages]
	 * @return {array} [list of languages]
	 * @author Miguel Trevino
	 */
	this.getLanguages = function () {
		return this.languages;
	};

	/*====================================
	=            js Languages            =
	====================================*/
	this.setJsLanguages = function (jsLanguages){
		this.jsLanguages = jsLanguages;
		console.log('this.jsLanguages', this.jsLanguages);
	};

	this.getJsLanguages = function (){
		return this.jsLanguages;
	};

	this.addJsLanguage = function (language){
		console.log('new language to add ',language);
		var service = this;
		var array = [];
		angular.forEach(service.jsLanguages, function(jsLan, key){
			if(jsLan.jobSeekerLanguageId){
				array.push(jsLan);
			}
		});
		array.push(language);
		service.setJsLanguages(array);
	};

	this.editJsLanguage = function(language) {
		this.removeJsLanguage(language);
		this.addJsLanguage(language);
	};

	this.removeJsLanguage = function (language){
		var array = [];
		angular.forEach(this.jsLanguages, function(jsLan, key){
			if(!jsLan.jobSeekerLanguageId || jsLan.jobSeekerLanguageId !== language.jobSeekerLanguageId){
				array.push(jsLan);
			}
		});
		this.setJsLanguages(array);
	};
	/*=====  End of js Languages  ======*/
	
	/*====================================
	=            js education            =
	====================================*/
	this.getJsEducation = function (){
		console.log('js education', this.jsEducation);
		return this.jsEducation;
	};
	
	this.setJsEducation = function (education){
		this.jsEducation = education;
		console.log('this.jsEducation', this.jsEducation);
	};

	this.addJsEducation = function (education){
		var array = [];
		angular.forEach(this.jsEducation, function(edu, key){
			if(edu.jobSeekerEducationId){
				array.push(edu);
			}
		});
		array.push(education);
		this.setJsEducation(array);
	};

	this.editJsEducation = function (education) {
		this.removeJsEducation(education);
		this.addJsEducation(education);
	};

	this.removeJsEducation = function (education){
		var array = [];
		angular.forEach(this.jsEducation, function(jsEdu, key){
			if(!jsEdu.jobSeekerEducationId || jsEdu.jobSeekerEducationId !== education.jobSeekerEducationId){
				array.push(jsEdu);
			}
		});
		this.setJsEducation(array);
	};
	
	/*=====  End of js education  ======*/
	

	/*==============================================
	=            js previous Experience            =
	==============================================*/
	
	this.getPreviousExperience = function (){
		return this.previousExperience;
	};
	
	this.setPreviousExperience = function (pre){
		this.previousExperience = pre;
	};

	this.addPreviousExperience = function (pre){
		var array = [];
		angular.forEach(this.previousExperience, function(pe, key){
			if(pe.previousExperienceId){
				array.push(pe);
			}
		});
		array.push(pre);
		this.setPreviousExperience(array);

	};

	this.editPreviousExperience = function (pre){
		this.removePreviousExperience(pre);
		this.addPreviousExperience(pre);
	};

	this.removePreviousExperience = function (pre){
		var array = [];
		angular.forEach(this.previousExperience, function(pe, key){
			if(!pe.previousExperienceId || (pe.previousExperienceId != pre.previousExperienceId)){
				array.push(pe);
			}
		});
		this.setPreviousExperience(array);
	};
	/*=====  End of js previous Experience  ======*/

	/*==================================
	=            js courses            =
	==================================*/
	
	this.getJsCourses = function (){
		return this.jsCourses;
	};

	this.setJsCourses = function (courses) {
		this.jsCourses = courses;
	};

	this.addJsCourse = function(course){
		var array=[];
		angular.forEach(this.jsCourses, function(c, key){
			if(c.jobSeekerCourseId){
				array.push(c);
			}
		});
		array.push(course);
		this.setJsCourses(array);
	};

	this.editJsCourse = function (course){
		this.removeJsCourse(course);
		this.addJsCourse(course);
	};

	this.removeJsCourse = function (course){
		var array = [];
		angular.forEach(this.jsCourses, function(c, key){
			if(!c.jobSeekerCourseId || (c.jobSeekerCourseId != course.jobSeekerCourseId)){
				array.push(c);
			}
		});
		this.setJsCourses(array);
	};	
	
	/*=====  End of js courses  ======*/

	/*=======================================
	=            js certificates            =
	=======================================*/
	
	this.getJsCertificates = function (){
		return this.jsCertificates;
	};

	this.setJsCertificates = function (certificates) {
		this.jsCertificates = certificates;
	};

	this.addJsCertificate = function(certificate){
		var array = [];
		angular.forEach(this.jsCertificates, function(c, key){
			if(c.jobSeekerCertificateId){
				array.push(c);
			}
		});
		array.push(certificate);
		this.setJsCertificates(array);
	};

	this.editJsCertificate = function (certificate){
		this.removeJsCertificate(certificate);
		this.addJsCertificate(certificate);
	};

	this.removeJsCertificate = function (certificate){
		var array = [];
		angular.forEach(this.jsCertificates, function(c, key){
			if(!c.jobSeekerCertificateId || (c.jobSeekerCertificateId != certificate.jobSeekerCertificateId)){
				array.push(c);
			}
		});
		this.setJsCertificates(array);
	};	
	/*=====  End of js certificates  ======*/

	/*=====================================
	=            js volunteers            =
	=====================================*/
	
	this.getJsVolunteers = function (){
		return this.jsVolunteers;
	};

	this.setJsVolunteers = function (volunteers) {
		this.jsVolunteers = volunteers;
	};

	this.addJsVolunteer = function(volunteer){
		var array = [];
		angular.forEach(this.jsVolunteers, function(vol, key){
			if(vol.jobSeekerVolunteerId){
				array.push(vol);
			}
		});
		array.push(volunteer);
		this.setJsVolunteers(array);
	};

	this.editJsVolunteer = function (volunteer){
		this.removeJsVolunteer(volunteer);
		this.addJsVolunteer(volunteer);
	};

	this.removeJsVolunteer = function (volunteer){
		var array = [];
		angular.forEach(this.jsVolunteers, function(vol, key){
			if(!vol.jobSeekerVolunteerId || (vol.jobSeekerVolunteerId != volunteer.jobSeekerVolunteerId)){
				array.push(vol);
			}
		});
		this.setJsVolunteers(array);
	};	
	
	/*=====  End of js volunteers  ======*/
	
	

	/*=================================
	=            js skills            =
	=================================*/
	
	this.getSkills = function (){
		return this.skills;
	};

	this.setSkills = function(skills){
		this.skills = skills;
	};

	this.getJsSkills = function (){
		return this.jsSkills;
	};

	this.setJsSkills = function (skills){
		this.jsSkills = skills;
	};

	this.addJsSkills = function (skills){
		var service = this;
		var array = [];
		angular.forEach(skills, function(skill, key){
			if(skill.jobSeekerSkillId){
				service.jsSkills.push(skill);
			}
		});
	};
	
	/*=====  End of js skills  ======*/


	/*=====================================
	=            hrm companies            =
	=====================================*/
	
	this.getHRMCompanies = function (){
		return this.HRMCompanies;
	};

	this.setHRMCompanies = function (companies){
		this.HRMCompanies = companies;
	};
	
	
	/*=====  End of hrm companies  ======*/
	
	
	
	
	

}];