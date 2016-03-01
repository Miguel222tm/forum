var vendorService = ['$http', '$q', 'RootService',  function ($http, $q, clubService){

	this.products = null;


	this.getProducts = function(){
		return this.products;
	};

	this.setProducts = function(products){
		this.products = products;
	};

	this.addProduct = function(product){
		var array = [];
		angular.forEach(this.products, function(pro, key){
			if(pro.productId)
				array.push(pro);
		});
		array.push(product);
		this.setProducts(array);
	};

	this.removeProduct = function(product){
		var array= [];
		angular.forEach(this.products, function(pro, key){
			if(pro.productId != product.productId || !pro.productId){
				array.push(pro);
			}
		});
		this.setProducts(product);
	};

}];

angular.module('app')
	.service('vendorService', vendorService);