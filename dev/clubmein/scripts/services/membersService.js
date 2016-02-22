
var MembersService = ['$http', '$q', 'RootService',  function ($http, $q, clubService){

	this.items = null;
	this.categories = null;

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

	this.addNewItem = function(item){
		if(!this.newItem()){
			this.items.push(item);
		}
	};

	this.newItem = function(){
		var booleano = false;
		angular.forEach(scope.items, function(item, key){
			if(item && !item.itemId){
				booleano = true;
			}
		});
		return booleano;
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