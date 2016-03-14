var fee = ['$state','RootService','$rootScope','$mdDialog','$timeout','adminService', function($state, clubService, $rootScope, $mdDialog, $timeout, adminService){

	return {
		restrict: 'E', 
		templateUrl: 'views/page/fee.html', 
		scope:{
			fee: '=',
			fees: '='
		},
		link: function(scope, element, attrs){

			scope.init = function(){
				if(scope.fee.feeId){
					scope.bContent = false;
				}else{
					scope.bContent = true;
				}

				scope.safeFee = angular.copy(scope.fee);
			};

			scope.save = function(){
				console.log('enters here');
				if(scope.allFieldsFilled()){
					var request = clubService.sendRequest('POST', '/fees', scope.fee);
					request.then(function(response){	
						scope.fee.feeId = response.feeId;
						clubService.addNotification( response.name +' saved.', 'success');
						scope.safeFee = angular.copy(response);
						scope.closeDetails();
					}, function(error){
						clubService.addNotification('error saving '+scope.fee.name, 'error');
					});
				}
			};

			scope.edit = function(){
				if(scope.allFieldsFilled && scope.fee.feeId){
					var request = clubService.sendRequest('PUT', '/fee/'+scope.fee.feeId, scope.fee);
					request.then(function(response){
						scope.fee = response;
						scope.safeFee = angular.copy(scope.fee);
						scope.closeDetails();
						clubService.addNotification(scope.fee.name + ' edited.', 'success');
					}, function(error){
						clubService.addNotification('error editing '+scope.fee.name, 'error');
					});
				}
			};

			scope.allFieldsFilled = function(){
				var booleano  = false;
				if(scope.fee.code && scope.fee.name && scope.fee.from && scope.fee.to && scope.fee.from < scope.fee.to && scope.fee.percentage){
					booleano = true;
				}
				return booleano;
			};

			scope.closeDetails = function(){
				scope.bContent = false;
			};

			scope.showContent = function(){
				scope.bContent = true;
			};

			scope.cancel = function(){
				scope.fee = angular.copy(scope.safeFee);
				scope.closeDetails();
			};

			scope.init();

		}
	};
}];


angular.module('app')
	.directive('fee', fee);