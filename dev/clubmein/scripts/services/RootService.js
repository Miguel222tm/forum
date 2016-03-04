angular.module('UURootService', []);

var RootService = ['$http', '$q', function ($http, $q){


	this.currentUSer = null;
	this.countries = null;
	this.states = null;
	this.cities = null;
	this.categories = null;
	
	this.getCurrentUser = function () {
		return this.currentUSer;
	};

	this.setCurrentUser = function (user){
		this.currentUSer = user;
	};


	this.getCountries = function(){
		return this.countries;
	};

	this.setCountries = function(countries){
		this.countries = countries;
	};

	this.getStates = function(){
		return this.states;
	};

	this.setStates = function(states){
		this.states = states;
	};

	this.getCities = function(){
		return this.cities;
	};

	this.setCities = function(cities){
		this.cities = cities;
	};

	this.getCategories = function(){
		return this.categories;
	};

	this.setCategories = function(categories){
		this.categories = categories;
	};

	


	/**
        * Initialize index
        * @type {number}
    */
    var index = 0;

    /**
     * Boolean to show error if new notification is invalid
     * @type {boolean}
     */
    this.invalidNotification = false;
    /**
     * Placeholder for notifications
     *
     * We use a hash with auto incrementing key
     * so we can use "track by" in ng-repeat
     *
     * @type 
     */
	this.notifications = {};

	/**
	 * HTTP request function to the server.
	 * @param  {string} method  "GET", "POST", "PUT", "DELETE"
	 * @param  {string} url     /url/something/1
	 * @param  {obj} data       Data to be send to the server
	 * @return {promise}        request promise
	 */
	this.sendRequest = function(method, url, data){
		var deferred = $q.defer();
		var request;
		if(!url){
			throw 'url is Undefined';
		} else if (typeof url !== 'string') {
			throw 'url should be type of string, instead got ' + typeof url + '.';
		}
		switch(method.toLowerCase()){
			case 'get':
				if(data){
					request = $http.get(url, data);
				} else {
					request = $http.get(url);
				}
				break;
			case 'post':
				if(data){
					request = $http.post(url, data);
				} else {
					throw new Error("No data object");
				}
				break;
			case 'put':
				if(data) {
					request = $http.put(url, data);
				} else {
					throw new Error("No data object");
				}
				break;
			case 'delete':
				request = $http.delete(url, data);
				break;
		}
		if(request) {
			request.success(function (data) {
				deferred.resolve(data);
			});
			request.error(function (error) {
				deferred.reject(error);
			});
			return deferred.promise;
		} else {
			throw new Error("Undefined method " + "'" + method + "'");
		}
	};


	this.addNotification = function(notification, type){
      	var i;
      	var style = "background: rgba(0,0,0,0.6) !important;";
      	if(!notification){
        	this.invalidNotification = true;
        	return;
      	}

      	i = index++;
      	this.invalidNotification = false;
      	if(!type){
      		type ="normal";
      	}
      	else if (type === 'error'){
      		style = "background: rgba(255, 0, 0, 0.6) !important;";
      	}
      	else if (type === 'success'){
      		style = "background: rgba(0,128,0,0.6) !important";
      	}
  		notification = {
  			text: notification,
  			type: type,
  			style: style
  		};
      	this.notifications[i] = notification;
      	console.log('notifications ',this.notifications);
	};

	this.getNotifications = function (){
		return this.notifications;
	};

	this.setNotifications = function (not){
		this.notifications = not;
	};

	this.formatDate = function (date) {
		date = moment(date).format('YYYY-MM-DD');
		return date;
	};


}];


angular.module('UURootService')
	.service('RootService', RootService);