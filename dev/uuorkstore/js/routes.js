
/* global angular: false */
  /**
   * @ngdoc function
   * @name app.config:uiRouter
   * @description
   * # Config
   * Config for the router
   */
  angular.module('uuorkstore')
   .run(['$rootScope', '$state', '$stateParams', function ( $rootScope,   $state,   $stateParams ) {
      $rootScope.$state = $state;
      $rootScope.$stateParams = $stateParams;
      
      // $stateChangeStart is fired whenever the state changes. We can use some parameters
      // such as toState to hook into details about the state as it is changing
      $rootScope.$on('$stateChangeStart', function(event, toState) {

         
        // Putting the user's data on $rootScope allows
        // us to access it anywhere across the app. Here
        // we are grabbing what is in local storage
         if($rootScope.currentUser) {
            //console.log('$rootScope======',$rootScope.currentUser);

            // The user's authenticated state gets flipped to
            // true so we can now show parts of the UI that rely
            // on the user being logged in
            $rootScope.authenticated = true;

            // If the user is logged in and we hit the auth route we don't need
            // to stay there and can send the user to the main state
            if(toState.name === "access.signin" || toState.name === "access.signup") {

            // Preventing the default behavior allows us to use $state.go
            // to change states
            event.preventDefault();
            
            // go to the "main" state which in our case is users
            $state.go('app.home');
            }       
         }
      });
   }])
   .config(['$stateProvider', '$urlRouterProvider', 'MODULE_CONFIG', '$authProvider','$httpProvider','$provide', function ($stateProvider, $urlRouterProvider, MODULE_CONFIG, $authProvider,$httpProvider, $provide) {

      function redirectWhenLoggedOut($q, $injector) {
         return {
            responseError: function(rejection) {
               // Need to use $injector.get to bring in $state or else we get
               // a circular dependency error
               var $state = $injector.get('$state');
               // Instead of checking for a status code of 400 which might be used
               // for other reasons in Laravel, we check for the specific rejection
               // reasons to tell us if we need to redirect to the login state
               var rejectionReasons = ['token_not_provided', 'token_expired', 'token_absent', 'token_invalid'];
               // Loop through each rejection reason and redirect to the login
               // state if one is encountered
               angular.forEach(rejectionReasons, function(value, key) {
                  if(rejection.data.error === value) {
                    // Send the user to the auth state so they can login
                    $state.go('access.signin');
                  }
               });
                  return $q.reject(rejection);
            }
         };
      }
      //$authProvider.httpInterceptor = false;
      // Setup for the $httpInterceptor
      $provide.factory('redirectWhenLoggedOut', redirectWhenLoggedOut);

      // Push the new factory onto the $http interceptor array
      $httpProvider.interceptors.push('redirectWhenLoggedOut');
      $authProvider.loginUrl = '/authenticate';

      $authProvider.facebook({
        clientId: '193867407627493'
      });

      $authProvider.google({
        clientId: '325516560821-2i72bk8rgf5av8rn9vha6qg7id86fo6l.apps.googleusercontent.com'
      });
      $authProvider.linkedin({
        clientId: '77klqbzj550pjv'
      });
    
      $urlRouterProvider.otherwise('/home');
       $stateProvider
          .state('app', {
             abstract: true,
             url: '/',
             views: {
                '': {
                templateUrl: 'views/layout.html',
                controller: 'MainController as main'
                },
                'aside': {
                   templateUrl: 'views/aside.html',
                   controller: 'UserController as user'
                },
                'content': {
                   templateUrl: 'views/content.html'
                }
             }
          })
          .state('app.dashboard', {
              url: '/dashboard',
              templateUrl: 'views/pages/dashboard.html',
              data : { title: 'Dashboard', folded: true },
              resolve: load(['scripts/controllers/chart.js','scripts/controllers/vectormap.js'])
          })
          .state('app.profile', {
             url: 'profile',
             templateUrl: 'views/pages/profile.html',
             data : { title: 'Profile' }
          })
          .state('app.settings', {
            url: 'settings',
            templateUrl: 'views/pages/settings.html',
            controller: 'settingsCtrl',
            data : { title: 'Settings' }

          })
          .state('app.blank', {
             url: 'blank',
             templateUrl: 'views/pages/blank.html',
             data : { title: 'Blank' }
          })
          .state('app.home',{
            url: 'home',
            templateUrl: 'views/pages/home.html',
            data : { title: 'Home' }             
          })
          .state('app.search',{
            url: 'search',
            templateUrl: 'views/pages/search.html',
            data : { title: 'Search' }             
          })
          .state('app.offers',{
            url: 'offers',
            templateUrl: 'views/pages/job-offers.html',
            data : { title: 'Job offers' }             
          })
          .state('app.myjobs',{
            url: 'my-jobs',
            templateUrl: 'views/pages/my-jobs.html',
            data : { title: 'My jobs' }             
          })
          .state('app.favorites',{
            url: 'my-jobs/favorites',
            templateUrl: 'views/pages/my-jobs-favorites.html',
            data : { title: 'Favorites' }             
          })
          .state('app.lastvisited',{
            url: 'my-jobs/visited',
            templateUrl: 'views/pages/my-jobs-visited.html',
            data : { title: 'Visited' }             
          })
          .state('app.applied',{
            url: 'my-jobs/applied',
            templateUrl: 'views/pages/my-jobs-applied.html',
            data : { title: 'Applied' }             
          })
          .state('app.interviewed',{
            url: 'my-jobs/interviewed',
            templateUrl: 'views/pages/my-jobs-interviewed.html',
            data : { title: 'Interviewed' }             
          })
          .state('app.completed',{
            url: 'my-jobs/completed',
            templateUrl: 'views/pages/my-jobs-finished.html',
            data : { title: 'Finished' }             
          })
          .state('app.onprocess',{
            url: 'my-jobs/on-process',
            templateUrl: 'views/pages/my-jobs-on-process.html',
            data : { title: 'Deleted'}             
          })
          .state('app.deleted',{
            url: 'my-jobs/deleted',
            templateUrl: 'views/pages/my-jobs-deleted.html',
            data : { title: 'Deleted'}             
          })
          .state('app.people',{
            url: 'connections',
            templateUrl: 'views/pages/connections.html',
            data : { title: 'Connections' }             
          })
          .state('app.help',{
            url: 'help',
            templateUrl: 'views/pages/help.html',
            data : { title: 'Help' }             
          })


          /*.state('page.document', {
             url: '/document',
             templateUrl: 'views/pages/document.html',
             data : { title: 'Document' }
          })
          .state('404', {
             url: '/404',
             templateUrl: 'views/pages/404.html'
          })
          .state('505', {
             url: '/505',
             templateUrl: 'views/pages/505.html'
          })*/
          .state('access', {
             url: '/access',
             template: '<div class="light-blue bg-big"><div ui-view class="fade-in-down smooth"></div></div>'
          })
          .state('access.signin', {
             url: '/signin',
             templateUrl: 'views/pages/signin.html',
             controller: 'AuthController as auth'
          })
          .state('access.signup', {
             url: '/signup',
             templateUrl: 'views/pages/signup.html',
             controller: 'AuthController as auth'
          })
          /*.state('access.forgot-password', {
             url: '/forgot-password',
             templateUrl: 'views/pages/forgot-password.html'
          })
          .state('access.lockme', {
             url: '/lockme',
             templateUrl: 'views/pages/lockme.html'
          })*/
          .state('access.select-user',{
            url: '/select-user', 
            templateUrl: 'views/pages/select-user.html',
            controller: 'LimboCtrl'
          });
          /*.state('auth', {
             url: '/auth',
             templateUrl: '../views/test/authView.html',
             controller: 'AuthController as auth'
          })
          .state('users', {
             url: '/users',
             templateUrl: '../views/test/userView.html',
             controller: 'UserController as user'
          });*/

          $httpProvider.interceptors.push(["$q", "$location", "$localStorage",'$rootScope', function ($q, $location, $localStorage, $rootScope) {
            return {
              "request": function (config) {
                
                
                config.headers = config.headers || {};
                if ($localStorage.token){
                  config.headers.Authorization = "Bearer " + $localStorage.token;
                }
                return config;
              },
              "responseError": function (response) {
                //console.log('responseError', response);
                if (response.status === 401 || response.status === 403) {
                  $location.path("/access/signin");
              }
              return $q.reject(response);
              }
            };
          }]);


          function load(srcs, callback) {
            return {
                deps: ['$ocLazyLoad', '$q',
                  function( $ocLazyLoad, $q ){
                    var name = null;
                    var deferred = $q.defer();
                    var promise  = false;
                    srcs = angular.isArray(srcs) ? srcs : srcs.split(/\s+/);
                    if(!promise){
                      promise = deferred.promise;
                    }
                    angular.forEach(srcs, function(src) {
                      promise = promise.then( function(){
                        angular.forEach(MODULE_CONFIG, function(module) {
                          if( module.name == src){
                            if(!module.module){
                              name = module.files;
                            }else{
                              name = module.name;
                            }
                          }else{
                            name = src;
                          }
                        });
                        return $ocLazyLoad.load(name);
                      } );
                    });
                    deferred.resolve();
                    return callback ? promise.then(function(){ return callback(); }) : promise;
                }]
            };
          }//end of load
      }]
    );
