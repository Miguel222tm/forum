var feeListCtrl =  ['$state', '$scope','RootService','adminService',  function($state, scope, clubService,  adminService){

	scope.init = function(){
		scope.feeList = [];
		getFeeList();
	};

	function getFeeList(){
		var request = clubService.sendRequest('GET', '/fees');
		request.then(function(response){
			scope.feeList = response;
			console.log('scope.feeList', scope.feeList);
		}, function(error){
			clubService.addNotification('error getting the fee List', 'error');
		});
	}

	scope.addFee = function(){
		var fee = {
			code: '', 
			name: '', 
			description: '',
			from: 1,
			to: 1,
			percentage: 0,
			default: false, 
			active: false
		}
		scope.feeList = scope.pushToFeeList(fee);
	};

	scope.pushToFeeList = function(newFee){
		
		var array = [];
		angular.forEach(scope.feeList, function(fee, key){
			if(fee.feeId)
				array.push(fee);
		});
		array.push(newFee);
		return array;
	};




	scope.init();
	
}];

angular.module('app')
	.controller('feeListCtrl', feeListCtrl);