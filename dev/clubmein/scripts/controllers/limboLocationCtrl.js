var limboLocationCtrl = ['$rootScope','$scope','RootService','$mdDialog','$auth','$state','$mdMedia', function($rootScope, scope, RootService, $mdDialog, $auth, $state, $mdMedia){

	console.log('location!');
	scope.country;
	scope.state;
	scope.city;
	scope.cancel = function(){
		$mdDialog.hide();
	};

	scope.getUser = function() {
        // This request will hit the index method in the AuthenticateController
        // on the Laravel side and will return the list of users
        var request= RootService.sendRequest('get','/session/user');
        request.then( function(response){
            if(!response.access_level){
            	$rootScope.limboUser = response;
                $state.go('access.select-user');
            }else{
                $rootScope.currentUser = response;
                console.log('rootscope.currentUser', $rootScope.currentUser);
                $state.go('app.dashboard');
            }
        }, function(error){
            vm.error= error;
        });
    };

	scope.save = function(){
		if(scope.country && scope.state && scope.city){
			var location = {
				country: scope.country, 
				state: scope.state, 
				city: scope.city
			};
			console.log('location ', location);
			console.log('limbo useer', $rootScope.limboUser);
			var request = RootService.sendRequest('POST', '/user/location', location);

			request.then(function(response){
				console.log('location added to this user!', response);
				var otherRequest = RootService.sendRequest('PUT', '/users/'+$rootScope.limboUser.userId, $rootScope.limboUser);
					otherRequest.then(function(response){
						console.log('response', response);
						$mdDialog.hide();
    					scope.getUser();
					}, function(error){
						RootService.addNotification('error saving the user', 'error');
					});
			}, function(error){
				RootService.addNotification('error saving your location', 'error');
			});
		}
	};

	scope.setCountry = function(country){
		scope.country = country;
	};
	scope.setState = function(state){
		scope.state = state;
	};
	scope.setCity = function(city){
		scope.city = city;
	};




}];


angular.module('app')
	.controller('limboLocationCtrl', limboLocationCtrl);