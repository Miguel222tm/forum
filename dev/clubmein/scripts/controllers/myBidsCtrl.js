var myBidsCtrl = ['$rootScope', '$state', '$scope', 'RootService','vendorService', function($rootScope, $state, scope,  clubService, vendorService){

	scope.init = function(){
		scope.bids = [];
		getBids();

	};

	function getBids(){
		var request = clubService.sendRequest('GET', '/vendor/bids');
		request.then(function(response){
			scope.bids = response;
			console.log('my bids', scope.bids);
		}, function(error){
			clubService.addNotification('error getting your bids', 'error');
		});
	}
	



	scope.init();

}];

angular.module('app')
	.controller('myBidsCtrl', myBidsCtrl);


