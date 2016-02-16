var MainController = [ '$http','$auth', '$rootScope','$state','RootService','$scope', function ($http, $auth, $rootScope, $state, $RootService, scope) {
	var vm = this;
        
    vm.user = null;
    vm.error = null;
    scope.notifications = $RootService.getNotifications();
    vm.getUser = function() {

        // This request will hit the index method in the AuthenticateController
        // on the Laravel side and will return the list of users
        console.log('service user', $RootService.getCurrentUser());
        if(!$RootService.getCurrentUser()){
            var request= $RootService.sendRequest('get','/session/user');
            request.then( function(response){
                if(!response.access_level){
                    $state.go('access.select-user');
                }else{
                    $rootScope.currentUser = response;
                    $RootService.setCurrentUser(response);
                    console.log('$r',$RootService.getCurrentUser());
                }
            }, function(error){
                vm.error= error;
            });
        }else{
            $rootScope.currentUser = $RootService.getCurrentUser();
        }

    };
    
    vm.getUser();

    scope.logout = function() {

        $auth.logout().then(function() {
            // Flip authenticated to false so that we no longer
            // show UI elements dependant on the user being logged in
            $rootScope.authenticated = false;

            // Remove the current user info from rootscope
            $rootScope.currentUser = null;
            $RootService.setCurrentUser(null);
            $RootService.setNotifications(null);

            $state.go('access.signin');

        });
    };


    




}];


angular.module('app')
    .controller('MainController', MainController);

    //searchCtrl
    //itemsCtrl