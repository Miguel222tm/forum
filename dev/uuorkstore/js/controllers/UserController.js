var UserController = [ '$http','$auth','$scope','$rootScope','$state','RootService', function ($http, $auth, scope, $rootScope, $state, $rootService) {
	var vm = this;
    
     // We would normally put the logout method in the same
        // spot as the login method, ideally extracted out into
        // a service. For this simpler example we'll leave it here
    vm.logout = function() {

        $auth.logout().then(function() {
            // Flip authenticated to false so that we no longer
            // show UI elements dependant on the user being logged in
            $rootScope.authenticated = false;

            // Remove the current user info from rootscope
            $rootScope.currentUser = null;
            $rootService.setCurrentUser(null);
            $rootService.setNotifications(null);

            $state.go('access.signin');

        });
    };
}];