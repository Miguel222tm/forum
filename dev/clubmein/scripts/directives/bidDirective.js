var bid = ['$rootScope', '$state', 'RootService','vendorService','$stateParams',  function($rootScope, $state, clubService, vendorService, $stateParams){

	return{
		restrict: 'E', 
		templateUrl: 'views/page/bid.html',
		scope: {
			bidId: '=',
			brandId: '=',
			brandName: '=',
			modelId: '=',
			modelName: '=',
			totalItems: '=',
			finalBidingList: '=',
			min: '=',
			max: '=',
			average: '=',
			offer: '='
		},
		link: function(scope, element, attrs){
			
			scope.init = function(){
				console.log('bidId', scope.bidId);
			}

			scope.sendBid = function(){
				if(scope.offer){
					console.log('enters on sendBid');

					scope.data = {
						brandId: scope.brandId,
						brand_name: scope.brandName,
						modelId: scope.modelId,
						model_name: scope.modelName,
						total_items: scope.totalItems,
						min_price: scope.min,
						max_price: scope.max, 
						average_price: scope.average,
						offer: scope.offer
					}
					var request  = clubService.sendRequest('POST','/vendor/bids', scope.data);
					request.then(function(response){
						scope.bSent = true;
					}, function(error){
						clubService.addNotification('error sending bid', 'error');
					});
				}
			};

			scope.init();
		}
	};
	
}];

angular.module('app')
	.directive('bid', bid);