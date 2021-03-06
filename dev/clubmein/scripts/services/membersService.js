var MembersService = ['$http', '$q', 'RootService',  function ($http, $q, clubService){

	this.items = null;
	this.categories = null;
	this.clubModelo = null;

	this.getItems = function (){
		return this.items;
	};

	this.setItems = function (items){
		this.items = items;
	};

	this.addItems = function(nuevo){
		var array = [];
		angular.forEach(this.items, function(item, key){
			if(item.itemId)
				array.push(item);
		});
		console.log('array with ids', array);
		array.push(nuevo);
		this.setItems(array);
	}

	this.removeItem = function(deletingItem){
		var array = [];
		angular.forEach(this.items, function(item, key){
			if(item.itemId != deletingItem.itemId || !item.itemId){
				array.push(item);
			}
		});
		this.setItems(array);
	};


	this.getCategories = function (){
		return this.categories;
	};

	this.setCategories = function(categories){
		this.categories = categories;
	};

	this.setClub = function(club){
		this.club = club;
	};

	this.getClub = function(club){
		return this.club;
	};

	this.getClubModelo = function(){
		return this.clubModelo;
	};

	this.setClubModelo = function(modelo){
		this.clubModelo = modelo;
	};

}];


angular.module('app')
	.service('MembersService', MembersService);