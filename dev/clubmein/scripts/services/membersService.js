
var MembersService = ['$http', '$q', 'RootService',  function ($http, $q, clubService){

	this.items = null;
	this.categories = null;

	this.getItems = function (){
		return this.items;
	};

	this.setItems = function (items){
		this.items = items;
	};

	this.getCategories = function (){
		return this.categories;
	};

	this.setCategories = function(categories){
		this.categories = categories;
	};

}];


angular.module('app')
	.service('MembersService', MembersService);