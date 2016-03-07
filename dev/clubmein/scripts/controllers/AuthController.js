
var AuthController = ['$auth', '$state','$http','$rootScope','$scope','RootService', function($auth, $state, $http, $rootScope, scope, $RootService){
	var vm = this;
  console.log('enter on the AuthController' );
  scope.user = null;
  scope.email = null;
  scope.password = null;
  vm.loginError = false;
  scope.loginErrorText = null ;
  scope.notifications = $RootService.getNotifications();
  scope.bForm = true;
  scope.bEmailConfirmation = false;

  /*===================================
  =            social auth            =
  ===================================*/

  scope.authenticate = function(provider) {
    var request = $auth.authenticate(provider);
    request.then(function(response){
      console.log('auth response :D', response);
      return $RootService.sendRequest('get','/session/user');
    }, function(error){
      console.log('error google', error);
    }).then(function(response){
      console.log('user:D', response);
      // Stringify the returned data to prepare it
      // to go into local storage
      var user = JSON.stringify(response);
      // The user's authenticated state gets flipped to
      // true so we can now show parts of the UI that rely
      // on the user being logged in
      $rootScope.authenticated = true;
      // Putting the user's data on $rootScope allows
      // us to access it anywhere across the app
      if(response){
          // Everything worked out so we can now redirect to
          // the users state to view the data
          console.log('response', response);
          if(response.access_level){
            $rootScope.currentUser = response.data;   
            $state.go('app.home');
          }else{
            $state.go('access.select-user');
          }
      }
    }, function(error){

    });


  };
  /*=====  End of social auth  ======*/
  scope.tries = 0;
  scope.login = function() {
    console.log('enter to login');
      var credentials = {
          email: scope.email,
          password: scope.password
      };
      $auth.login(credentials).then(function() {
          // Return an $http request for the now authenticated
          // user so that we can flatten the promise chain
          // $RootService.sendRequest('post', '/signup', user);
          return $RootService.sendRequest('get','/session/user');
      // Handle errors
      }, function(error) {
          vm.loginError = true;
          scope.loginErrorText = error.data.error;
          $RootService.addNotification(scope.loginErrorText); 

      // Because we returned the $http.get request in the $auth.login
      // promise, we can chain the next promise to the end here
      }).then(function(response) {
          console.log('authenticated ', response);
          // Stringify the returned data to prepare it
          // to go into local storage
          var user = JSON.stringify(response);
          // The user's authenticated state gets flipped to
          // true so we can now show parts of the UI that rely
          // on the user being logged in
          $rootScope.authenticated = true;
          // Putting the user's data on $rootScope allows
          // us to access it anywhere across the app
          if(response.active || response.user.active){
            // Everything worked out so we can now redirect to
            // the users state to view the data
            console.log('response', response);
            if(response.access_level){
              $rootScope.currentUser = response.data;   
              $state.go('app.home');
            }else{
              $state.go('access.select-user');
            }
            
          }else if(response.verify){
            $RootService.addNotification('Please verify your email '+ response.email, 'error');
            scope.tries+= 1;
            if(scope.tries === 3 || scope.tries === 6){
              $RootService.addNotification('we sent you another email verification, please look at your email'+ scope.email);
            }
          }
      }, function(error){
          console.log(error);
      });
  };



  scope.signUp = function(){
      console.log('register the user', scope.user);
      scope.loading =  true;
      var user = {
          name: scope.user.firstName+" "+scope.user.lastName,
          firstName: scope.user.firstName,
          lastName: scope.user.lastName,
          email: scope.user.email,
          password: scope.user.password
      };
      if(scope.user.firstName && scope.user.lastName && scope.user.email && scope.user.password === scope.user.repeatPassword){
          var request= $RootService.sendRequest('post', '/signup', user);
          request.then( function(response){
              console.log('registration response: ', response);
              if(response === 'account already created'){
                $RootService.addNotification('account already created', 'error');
              }else{
                $RootService.addNotification('registration completed!', 'success');
                scope.bForm = false;
                scope.bEmailConfirmation = true;
                scope.loading = false;  
              }
              
              
          }, function(error){
              $RootService.addNotification(error.error, 'error');
              console.log(' error on registration', error);
          });
      }else{
        $RootService.addNotification('please fill all the fields', 'error');
      }
  };


  vm.logout = function() {

    $auth.logout().then(function() {
        // Flip authenticated to false so that we no longer
        // show UI elements dependant on the user being logged in
        $rootScope.authenticated = false;
        // Remove the current user info from rootscope
        $rootScope.currentUser = null;
        $state.go('access.signin');

    });
  };

  if($rootScope.authenticated === true){
    vm.logout();
  }
  /**
   * Add a notification
   *
   * @param notification
   */
  scope.add = function(notification){
    $RootService.addNotification(notification);
  };

}];


angular.module('app')
  .controller('AuthController', AuthController);