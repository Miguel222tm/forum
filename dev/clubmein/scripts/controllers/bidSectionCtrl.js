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
			setTotalItems();
		}, function(error){
			clubService.addNotification('error getting your potential buyers', 'error');
		});
	};

	


	function setTotalItems (){
		scope.totalCity = 0;
		scope.totalState = 0;
		scope.totalCountry = 0;
		scope.totalWorld = 0;

		scope.model = scope.buyersList.model;

		if(scope.model.city.length){
			angular.forEach(scope.model.city, function(city, key){
				scope.totalCity += city.quantity;
			});
		}
		if(scope.model.state.length){
			angular.forEach(scope.model.state, function(state, key){
				scope.totalState += state.quantity;
			});
		}
		if(scope.model.country.length){
			angular.forEach(scope.model.world, function(country, key){
				scope.totalCountry += country.quantity;
			});
		}
		if(scope.model.world.length){
			angular.forEach(scope.model.world, function(world, key){
				scope.totalWorld += world.quantity;
			});	
		}

		angular.forEach(scope.buyersList.brand, function(model, key){
			model.totalCity = 0;
			model.totalState = 0;
			model.totalCountry = 0;
			model.totalWorld = 0;
			if(model.city.length){
				angular.forEach(model.city, function(city, key){
					model.totalCity += city.quantity;
				});
			}
			if(model.state.length){
				angular.forEach(model.state, function(state, key){
					model.totalState += state.quantity;
				});
			}
			if(model.country.length){
				angular.forEach(model.world, function(country, key){
					model.totalCountry += country.quantity;
				});
			}
			if(model.world.length){
				angular.forEach(model.world, function(world, key){
					model.totalWorld += world.quantity;
				});	
			}
			
		});
	}

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
			scope.finalBidingList.totalCity = scope.totalCity;
			scope.finalBidingList.totalState = scope.totalState;
			scope.finalBidingList.totalCountry = scope.totalCountry;
			scope.finalBidingList.totalWorld = scope.totalWorld;
			console.log('finalBidingList', scope.finalBidingList);
			scope.calculateBid();
		}
	};

	scope.calculateBid = function(){
		scope.totalItems = scope.finalBidingList.city.length + scope.finalBidingList.state.length + scope.finalBidingList.country.length + scope.finalBidingList.world.length;
		var prices = [];
		if(scope.finalBidingList.city.length){
			angular.forEach(scope.finalBidingList.city, function(cityPrices, key){
				prices.push(cityPrices.price);0
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
				scope.tempBidingList.totalCity = 0;
				angular.forEach(scope.tempBidingList.city, function(element, key){
					console.log('city element', element);
					prices.push(element.price);
					scope.tempBidingList.totalCity += element.quantity;
				});
			}
			if(otherModel.state && otherModel.state.checked){
				scope.tempBidingList.state = otherModel.state;
				booleano = true;
				scope.tempBidingList.totalState = 0;
				angular.forEach(scope.tempBidingList.state, function(element, key){
					prices.push(element.price);
					scope.tempBidingList.totalState += element.quantity;
				});
			}
			if(otherModel.country && otherModel.country.checked){
				scope.tempBidingList.country = otherModel.country;
				booleano = true;
				scope.tempBidingList.totalCountry = 0;
				angular.forEach(scope.tempBidingList.country, function(element, key){
					prices.push(element.price);
					scope.tempBidingList.totalCountry += element.quantity;
				});
			}
			if(otherModel.world && otherModel.world.checked){
				scope.tempBidingList.world = otherModel.world;
				booleano = true;
				scope.tempBidingList.totalWorld = 0;
				angular.forEach(scope.tempBidingList.world, function(element, key){
					prices.push(element.price);
					scope.tempBidingList.totalWorld += element.quantity;
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


