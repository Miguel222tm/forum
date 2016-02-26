var adminService = ['$http', '$q', 'RootService',  function ($http, $q, clubService){
	this.categories =null;

	this.getCategories = function(){
		return this.categories;
	};

	this.setCategories = function(categories){
		this.categories = categories;
	};

	this.addCategory = function(category){
		var array = [];
		angular.forEach(this.categories, function(cat, key){
			if(cat.categoryId)
				array.push(cat);
		});
		array.push(category);
		this.setCategories(array);
	};

	this.editCategory = function(category){
		angular.forEach(this.categories, function(cat, key){
			if(cat.categoryId === category.categoryId){
				cat.name = category.name;
				cat.code = category.code;
			}
		});
	};

	this.removeCategory = function(category){
		var array = [];
		angular.forEach(this.categories, function(cat, key){
			if(cat.categoryId != category.categoryId || !cat.categoryId){
				array.push(cat);
			}
		});
		this.setCategories(array);
	};

}];



angular.module('app')
	.service('adminService', adminService);