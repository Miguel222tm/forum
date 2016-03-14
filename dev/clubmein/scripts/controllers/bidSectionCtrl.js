var bidSectionCtrl = ['$rootScope', '$state', '$scope', 'RootService','vendorService','$stateParams',  function($rootScope, $state, scope,  clubService, vendorService, $stateParams){

	scope.init = function(){
		if($stateParams.id){
			scope.search();
		}
	};

	scope.search = function(){
		var request = clubService.sendRequest('GET','/vendor/biding-section?id='+$stateParams.id);
		request.then(function(response){
			scope.buyersList = response;
			console.log('response buyersList', response);
		}, function(error){
			clubService.addNotification('error getting your potential buyers', 'error');
		});
	};

	scope.init();

}];

angular.module('app')
	.controller('bidSectionCtrl', bidSectionCtrl);


