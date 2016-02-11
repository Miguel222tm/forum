var LimboCtrl = ['$rootScope','$scope','RootService','$mdDialog','$auth','$state', function($rootScope, scope, RootService, $mdDialog, $auth, $state){
	var vm = this;
        
    vm.user = null;
    vm.error = null ;

    vm.getUser = function() {

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
                $state.go('app.home');
            }
        }, function(error){
            vm.error= error;
        });
    };
    //hello 
    vm.getUser();



	scope.setUserType = function (type){
		console.log('type', type);
	};

	scope.showConfirm = function(ev, code, type){

		 // Appending dialog to document.body to cover sidenav in docs app
	    var confirm = $mdDialog.confirm()
	          .title('Do you really want to be a '+type+'?')
	          .textContent('Please confirm your answer.')
	          .ariaLabel('Lucky day')
	          .targetEvent(ev)
	          .ok('Yes!')
	          .cancel("Cancel");

	    $mdDialog.show(confirm).then(function() {
    		var data ={
    			code: code
    		};
    		console.log('dat', data);
    		console.log('user', $rootScope.limboUser);
    		var request = RootService.sendRequest('PUT', '/users/'+$rootScope.limboUser.userId, data);
    		request.then( function(response){
    			console.log('response', response);
    			vm.getUser();
    		}, function(error){	
    			console.log('error', error);
    		});

    	
	    }, function() {
	      console.log('you rejected it' );
	    });
	};
}];

angular.module('app').controller('LimboCtrl', LimboCtrl);