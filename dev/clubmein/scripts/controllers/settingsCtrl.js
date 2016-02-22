var SettingsCtrl = ['$rootScope','$scope','RootService', function($rootScope, scope , clubService){
	console.log('settingsCtrl', $rootScope.currentUser);

	scope.init = function(){
		scope.bEditLocation = false;
	};

	scope.editLocation = function(){
		scope.safeLocation = angular.copy($rootScope.currentUser.location);
		scope.bEditLocation = true;
	};

	scope.cancel = function (){
		scope.bEditLocation = false;
		$rootScope.currentUser.location = angular.copy(scope.safeLocation);
	};

	scope.update = function(){
		console.log('currentUser', $rootScope.currentUser);
		$rootScope.currentUser.name = $rootScope.currentUser.firstName + " " + $rootScope.currentUser.lastName;
		
		var request = clubService.sendRequest('PUT', '/member/'+$rootScope.currentUser.memberId, $rootScope.currentUser);
		request.then(function(response){
			console.log('response', response);
			$rootScope.currentUser.firstName = response.firstName;
			$rootScope.currentUser.lastName = response.lastName;
			clubService.addNotification('profile updated', 'success');

		}, function(error){
			clubService.addNotification('error updating profile', 'error');
		})
	};

	scope.updateLocation = function(){
		console.log('updating location ', $rootScope.currentUser.location);
		var request;
		if($rootScope.currentUser.location && $rootScope.currentUser.location.userLocationId && $rootScope.currentUser.location.country && $rootScope.currentUser.location.state && $rootScope.currentUser.location.city){
			request = clubService.sendRequest('PUT', '/user/location', $rootScope.currentUser.location);
			request.then(function(response){
				$rootScope.currentUser.location = response;
				clubService.addNotification('location updated successfully', 'success');
				scope.bEditLocation = false;
			}, function(error){
				clubService.addNotification('error updating your location', 'error');
			});
		}else if($rootScope.currentUser.location && !$rootScope.currentUser.location.userLocationId && $rootScope.currentUser.location.country && $rootScope.currentUser.location.state && $rootScope.currentUser.location.city){	

			request = clubService.sendRequest('POST', 'user/location', $rootScope.currentUser.location);
			request.then(function(response){
				console.log('response::', response);
				$rootScope.currentUser.location = response;
				clubService.addNotification('location updated successfully', 'success');
				scope.bEditLocation = false;
			}, function(error){
				clubService.addNotification('error updating your location', 'error');
			});
		}

	};

	



	scope.init();

}];


angular.module('app')
	.controller('SettingsCtrl', SettingsCtrl);