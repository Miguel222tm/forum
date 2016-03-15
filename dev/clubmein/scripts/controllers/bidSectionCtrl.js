var bidSectionCtrl = ['$rootScope', '$state', '$scope', 'RootService','vendorService','$stateParams',  function($rootScope, $state, scope,  clubService, vendorService, $stateParams){

	scope.init = function(){

		if($stateParams.id){
			scope.bBiding = false;
			scope.mBiding = false;
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

	scope.bidModel = function(){
		scope.bBid = false;
		scope.finalBidingList = {
			city: [],
			state: [],
			country: [],
			world: []
		};
		if(scope.buyersList.model.city.checked){
			scope.finalBidingList.city = scope.buyersList.model.city;
			scope.bBid = true;
		}
		if(scope.buyersList.model.state.checked){
			scope.finalBidingList.state = scope.buyersList.model.state;
			scope.bBid = true;
		}
		if(scope.buyersList.model.country.checked){
			scope.finalBidingList.country = scope.buyersList.model.country;
			scope.bBid = true;
		}
		if(scope.buyersList.model.world.checked){
			scope.finalBidingList.world = scope.buyersList.model.world;
			scope.bBid = true;
		}
		if(scope.bBid){
			scope.mBiding = true;
			console.log('finalBidingList', scope.finalBidingList);
			scope.calculateBid();
		}
	};

	scope.calculateBid = function(){
		scope.totalItems = scope.finalBidingList.city.length + scope.finalBidingList.state.length + scope.finalBidingList.country.length + scope.finalBidingList.world.length;
		var prices = [];
		if(scope.finalBidingList.city.length){
			angular.forEach(scope.finalBidingList.city, function(cityPrices, key){
				prices.push(cityPrices.price);
			});
		}
		if(scope.finalBidingList.state.length){
			angular.forEach(scope.finalBidingList.state, function(statePrices, key){
				prices.push(statePrices.price);
			});
		}
		if(scope.finalBidingList.country.length){
			angular.forEach(scope.finalBidingList.country, function(countryPrices, key){
				prices.push(countryPrices.price);
			});
		}
		if(scope.finalBidingList.world.length){
			angular.forEach(scope.finalBidingList.world, function(worldPrices, key){
				prices.push(worldPrices.price);
			});
		}
		scope.min = Math.min.apply(Math, prices); // 3
		scope.max = Math.max.apply(Math, prices); // 3
		scope.average = 0;

		angular.forEach(prices, function(price, key){
			scope.average+=price;
		});
		scope.average = scope.average/prices.length;

		console.log('prices!', prices, 'min', scope.min, 'max', scope.max, 'average', scope.average);

	};

	scope.bidBrand = function(){
		console.log('scope.buyersList.brand', scope.buyersList.brand);
		if(checkedBrandModels()){
			scope.bBiding = true;
		}
	};

	function checkedBrandModels(){
		var booleano = false;
		scope.brandList = [];
		console.log('otherModel', scope.buyersList.brand);
		angular.forEach(scope.buyersList.brand, function(otherModel, key){
			var prices = [];	
			scope.tempBidingList = {
				brand_name: scope.buyersList.brand.name,
				brandId: scope.buyersList.brand.id,
				model_name: otherModel.name,
				modelId: otherModel.id,
				city: [],
				state: [],
				country: [],
				world: []
			};
			if(otherModel.city && otherModel.city.checked){
				scope.tempBidingList.city = otherModel.city;
				booleano = true;
				angular.forEach(scope.tempBidingList.city, function(element, key){
					prices.push(element.price);
				});
			}
			if(otherModel.state && otherModel.state.checked){
				scope.tempBidingList.state = otherModel.state;
				booleano = true;
				angular.forEach(scope.tempBidingList.state, function(element, key){
					prices.push(element.price);
				});
			}
			if(otherModel.country && otherModel.country.checked){
				scope.tempBidingList.country = otherModel.country;
				booleano = true;
				angular.forEach(scope.tempBidingList.country, function(element, key){
					prices.push(element.price);
				});
			}
			if(otherModel.world && otherModel.world.checked){
				scope.tempBidingList.world = otherModel.world;
				booleano = true;
				angular.forEach(scope.tempBidingList.world, function(element, key){
					prices.push(element.price);
				});
			}
			if(scope.tempBidingList.city.length || scope.tempBidingList.state.length || scope.tempBidingList.country.length || scope.tempBidingList.world.length){
				scope.tempBidingList.totalItems = scope.tempBidingList.city.length + scope.tempBidingList.state.length + scope.tempBidingList.country.length + scope.tempBidingList.world.length;

				scope.tempBidingList.min = Math.min.apply(Math, prices); // 3
				scope.tempBidingList.max = Math.max.apply(Math, prices); // 3
				scope.tempBidingList.average = 0;

				angular.forEach(prices, function(price, key){
					scope.tempBidingList.average+=price;
				});
				scope.tempBidingList.average = scope.tempBidingList.average/prices.length;

				scope.brandList.push(scope.tempBidingList);
			}
		});
		return booleano;
	}

	scope.init();

}];

angular.module('app')
	.controller('bidSectionCtrl', bidSectionCtrl);


