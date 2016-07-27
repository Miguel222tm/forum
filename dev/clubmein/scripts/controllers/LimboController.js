var LimboCtrl = ['$rootScope','$scope','RootService','$mdDialog','$auth','$state','$mdMedia', function($rootScope, scope, RootService, $mdDialog, $auth, $state, $mdMedia){
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

    scope.isEmployee = function(){
        if($rootScope.limboUser.email.match('@clubmein.com')){
            return true;
        }else{
            return false;
        }
    };



    scope.showAdvanced = function(ev, code, type) {
        $rootScope.limboUser.code = code;
        var useFullScreen = ($mdMedia('sm') || $mdMedia('xs'))  && scope.customFullscreen;
        $mdDialog.show({
          controller: limboLocationCtrl,
          templateUrl: 'views/partials/complete-user-location.html',
          parent: angular.element(document.body),
          targetEvent: ev,
          clickOutsideToClose:true,
          fullscreen: useFullScreen
        })
        .then(function(answer) {
          scope.status = 'You said the information was "' + answer + '".';
        }, function() {
          scope.status = 'You cancelled the dialog.';
        });
        scope.$watch(function() {
          return $mdMedia('xs') || $mdMedia('sm');
        }, function(wantsFullScreen) {
          scope.customFullscreen = (wantsFullScreen === true);
        });
    };
}];

angular.module('app').controller('LimboCtrl', LimboCtrl);