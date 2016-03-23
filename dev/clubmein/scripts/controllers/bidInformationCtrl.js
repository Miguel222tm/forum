var bidInformationCtrl = ['$rootScope', '$state', '$scope', 'RootService','$stateParams',  function($rootScope, $state, scope,  clubService,$stateParams){
	
	scope.init = function(){
		if($stateParams.id){
			scope.bidId = $stateParams.id;
			getVendorInformation();
		}
	};

	function getVendorInformation(){
		var request = clubService.sendRequest('GET','/bid/'+scope.bidId);
		request.then( function(response){
			scope.bidInformation = response;
			console.log('bidInformation', scope.bidInformation);
			scope.calculateRate();
		}, function(error){
			clubService.addNotification('error getting bid information', 'error');
			$state.go('app.items');
		});
	}


	scope.calculateRate = function(){
		scope.rates = scope.bidInformation.vendor.user.rates;
		console.log('rates', scope.rates);
		scope.averageRate = 0;
		angular.forEach(scope.rates, function(rate, key){
			scope.averageRate+=rate.rate;
		});
		if(scope.rates.length){
			console.log('scope.averageRate', scope.averageRate);
			scope.averageRate = scope.averageRate / scope.rates.length;
		}else{
			scope.averageRate = 0;
		}

	};


	scope.rateVendor = function(){
		var data = {
				rate: scope.rate,
				userId: scope.bidInformation.vendor.user.userId,
				individual: true
		};
		if(scope.bidInformation.rate){
			var request = clubService.sendRequest('PUT', '/rate/'+scope.bidInformation.rate.rateId, data);
		}else{
			var request = clubService.sendRequest('POST', '/rates', data);
		}
		request.then( function(response){
			scope.bidInformation.rate = response;
			console.log('rate ressponse', response);
			clubService.addNotification('thank you for your rating!', 'success');
		}, function(error){
			clubService.addNotification('error rating the vendor', 'error');
		});
	};

	scope.init();


}];

angular.module('app')
	.controller('bidInformationCtrl', bidInformationCtrl);