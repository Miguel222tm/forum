var vendorsListCtrl = ['$state', '$scope','RootService', function($state, scope, clubService){
		//console.log('vendorsListCtrl' );
	
	scope.init = function(){
		getVendorList();
	};


	function getVendorList(){
		var request = clubService.sendRequest('GET','/vendors');
		request.then(function(response){
			scope.vendorList = response;
			console.log('vendorList', response);
		}, function(error){
			clubService.addNotification('error getting vendors', 'error');
		});
	}


	scope.init();
}];


angular.module('app')
	.controller('vendorsListCtrl', vendorsListCtrl);