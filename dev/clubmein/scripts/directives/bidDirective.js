var bid = ['$rootScope', '$state', 'RootService','vendorService','$stateParams','$mdDialog',  function($rootScope, $state, clubService, vendorService, $stateParams, $mdDialog){

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
				scope.totalBuyers = scope.totalItems;
				scope.getTotalItems();
				scope.getFees();

			}
			scope.getFees = function(){
				var request = clubService.sendRequest('GET', '/fees');
				request.then(function(response){
					scope.fees = response;
					console.log('FEES', scope.fees);
					scope.getSelectedFee();
				}, function(error){
					clubService.addNotification('error getting fees', 'error');
				});
			};

			scope.getSelectedFee = function(){
				angular.forEach(scope.fees, function(fee, key){
					//console.log('fee', fee);
					if(scope.allItems >= fee.from && scope.allItems <= fee.to){
						scope.selectedFee = fee;
					}
				});
				console.log('this is the fee for this bid', scope.selectedFee);
				scope.calculateTotalToPay();
			};
			/**
			 * [calculateTotalToPay description]
			 * @return {[type]} [description]
			 */
			scope.calculateTotalToPay = function(){
				scope.payment = scope.offer * scope.allItems * (scope.selectedFee.percentage /100) * scope.publishTime * (1+(0.05*scope.totalItems));
				scope.payment = scope.payment.toFixed(2);
				return scope.payment;
			};

			scope.sendBid = function(){
				if(scope.offer && scope.publishTime){
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
						offer: scope.offer,
						payment: scope.payment
					}
					var request  = clubService.sendRequest('POST','/vendor/bids', scope.data);
					request.then(function(response){
						scope.bSent = true;
					}, function(error){
						clubService.addNotification('error sending bid', 'error');
					});
				}
			};

			scope.getTotalItems = function(){
				scope.allItems = 0;
				if(scope.finalBidingList.totalCity){
					scope.allItems += scope.finalBidingList.totalCity;
				}
				if(scope.finalBidingList.totalState){
					scope.allItems += scope.finalBidingList.totalState
				}
				if(scope.finalBidingList.totalCountry){
					scope.allItems += scope.finalBidingList.totalCountry
				}
				if(scope.finalBidingList.totalWorld){
					scope.allItems += scope.finalBidingList.totalWorld;
				}
				console.log('total items', scope.allItems);
			};

			scope.showConfirm = function(ev, code, type){
				 // Appending dialog to document.body to cover sidenav in docs app
			   var confirm = $mdDialog.confirm()
			          .title('Do you really want delete this bid ?')
			          .textContent('Please confirm your answer.')
			          .ariaLabel('Lucky day')
			          .targetEvent(ev)
			          .ok('Yes!')
			          .cancel("Cancel");

			   $mdDialog.show(confirm).then(function() {
		    		scope.deleteFee();
		    	
			    }, function() {
			      console.log('canceled');
			    });
		    
			};

			scope.deleteFee = function(){
				var request = clubService.sendRequest('DELETE', '/bid/'+scope.bidId);
				request.then(function(response){
					scope.finalBidingList = null;
				}, function(error){
					clubService.addNotification('error deleting the bid', 'error');
				});
				
			};


			scope.init();
		}
	};
	
}];

angular.module('app')
	.directive('bid', bid);