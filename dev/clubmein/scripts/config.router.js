/**
 * @ngdoc function
 * @name app.config:uiRouter
 * @description
 * # Config
 * Config for the router
 */

    angular
      .module('app')
      .run(runBlock)
      .config(config);

      runBlock.$inject = ['$rootScope', '$state', '$stateParams'];
      function runBlock($rootScope,   $state,   $stateParams) {
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
      }

      config.$inject =  ['$stateProvider', '$urlRouterProvider', 'MODULE_CONFIG','$authProvider','$httpProvider','$provide'];
      function config( $stateProvider,   $urlRouterProvider,   MODULE_CONFIG, $authProvider,$httpProvider, $provide ) {

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
                  if(rejection.data){
                    if(rejection.data.error === value) {
                      // Send the user to the auth state so they can login
                      $state.go('access.signin');
                    }
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
        
        var p = getParams('layout'),
            l = p ? p + '.' : '',
            layout = 'views/layout/layout.'+l+'html',
            dashboard = 'views/dashboard/dashboard.'+l+'html';

        $urlRouterProvider
          .otherwise('/app/home');
        $stateProvider
          .state('app', {
            abstract: true,
            url: '/app',
            views: {
              '': {
                templateUrl: layout, 
                controller: 'MainController as main'
              }
            }
          })
            .state('app.dashboard', {
              url: '/dashboard',
              templateUrl: dashboard,
              data : { title: 'Dashboard' },
              controller: "ChartCtrl",
              resolve: load(['scripts/controllers/chart.js'])
            })

            .state('app.home', {
              url: '/home',
              templateUrl: 'views/page/home.html', 
              data: { title: 'Home' } ,
              controller: 'homeCtrl',  
            })
            .state('app.invite', {
              url: '/invite',
              templateUrl: 'views/page/invite.html', 
              data: { title: 'Invite' } ,
              controller: 'InviteCtrl',  
            })

            .state('app.items', {
              url: '/items',
              templateUrl: 'views/page/items.html', 
              data: { title: 'Items' } ,
              controller: 'itemsCtrl',  
            })

            .state('app.search', {
              url: '/search',
              templateUrl: 'views/page/search.html', 
              data: { title: 'Search' } ,
              controller: 'searchCtrl',  
            })

            .state('app.nearby', {
              url: '/nearby',
              templateUrl: 'views/page/near-by.html', 
              data: { title: 'Near by' } ,
              controller: 'nearByCtrl',  
            })

            .state('app.myproducts', {
              url: '/myproducts',
              templateUrl: 'views/page/my-products.html', 
              data: { title: 'My products' } ,
              controller: 'myProductsCtrl',  
            })
            .state('app.bidingSection', {
              url: '/product/:id',
              templateUrl: 'views/page/biding-section.html', 
              data: { title: 'Biding Section' } ,
              controller: 'bidSectionCtrl',  
            })
            .state('app.bidInformation', {
              url: '/bid/:id',
              templateUrl: 'views/page/bid-information.html', 
              data: { title: 'Bid information' } ,
              controller: 'bidInformationCtrl',  
            })

            .state('app.mybids', {
              url: '/mybids',
              templateUrl: 'views/page/my-bids.html', 
              data: { title: 'My bids' } ,
              controller: 'myBidsCtrl',  
            })

            .state('app.club', {
              url: '/club',
              templateUrl: 'views/page/club.html', 
              data: { title: 'Category/Clubs'} ,
              controller: 'clubCtrl',  
            })
            .state('app.modelo', {
              url: '/club/modelo',
              templateUrl: 'views/page/club-modelo.html', 
              data: { title: 'Club' } ,
              controller: 'clubModeloCtrl',  
            })

            .state('app.categories', {
              url: '/categories',
              templateUrl: 'views/page/categories.html', 
              data: { title: 'Categories' } ,
              controller: 'categoriesCtrl',  
            })

            .state('app.requests', {
              url: '/requests',
              templateUrl: 'views/page/user-requests.html', 
              data: { title: 'User Requests' } ,
              controller: 'userRequestsCtrl',  
            })
            .state('app.members', {
              url: '/users/members',
              templateUrl: 'views/page/members.html', 
              data: { title: 'Members' } ,
              controller: 'membersListCtrl',  
            })
            .state('app.vendors', {
              url: '/users/vendors',
              templateUrl: 'views/page/vendors.html', 
              data: { title: 'Vendors' } ,
              controller: 'vendorsListCtrl',  
            })
            .state('app.employees', {
              url: '/users/employees',
              templateUrl: 'views/page/employees.html', 
              data: { title: 'Employees' } ,
              controller: 'employeesListCtrl',  
            })

            //fees
            .state('app.fees', {
              url: '/fees',
              templateUrl: 'views/page/fees.html', 
              data: { title: 'Fees' } ,
              controller: 'feeListCtrl',  
            })




            // applications

            .state('app.contact', {
              url: '/contact',
              templateUrl: 'apps/contact/main.html',
              data : { title: 'Contacts', hideFooter: true },
              controller: 'ContactCtrl',
              resolve: load('apps/contact/contact.js')
            })

            .state('app.calendar', {
              url: '/calendar',
              templateUrl: 'apps/calendar/main.html',
              data : { title: 'Calendar' },
              controller: 'FullcalendarCtrl',
              resolve: load(['moment','fullcalendar','ui.calendar','apps/calendar/calendar.js'])
            })

            .state('app.todo', {
              url: '/todo',
              templateUrl: 'apps/todo/todo.html',
              data : { title: 'Todo' },
              controller: 'TodoCtrl',
              resolve: load('apps/todo/todo.js')
            })
            .state('app.todo.list', {
                url: '/{fold}'
            })

            .state('app.note', {
              url: '/note',
              templateUrl: 'apps/note/main.html',
              data : { title: 'Note', hideFooter: true }
            })
            .state('app.note.list', {
              url: '/list',
              templateUrl: 'apps/note/list.html',
              data : { title: 'Note'},
              controller: 'NoteCtrl',
              resolve: load(['apps/note/note.js', 'moment'])
            })
            .state('app.note.item', {
              url: '/{id}',
              views: {
                '': {
                  templateUrl: 'apps/note/item.html',
                  controller: 'NoteItemCtrl',
                  resolve: load(['apps/note/note.js', 'moment'])
                }
              },
              data : { title: 'Note' }
            })

            // ui router
            .state('app.layout', {
              url: '/layout',
              template: '<div ui-view></div>'
            })
              .state('app.layout.header', {
                url: '/header',
                templateUrl: 'views/ui/headers.html',
                data : { title: 'Headers' }
              })
              .state('app.layout.aside', {
                url: '/aside',
                templateUrl: 'views/ui/asides.html',
                data : { title: 'Asides' }
              })
              .state('app.layout.footer', {
                url: '/footer',
                templateUrl: 'views/ui/footers.html',
                data : { title: 'Footers' }
              })

            .state('app.inbox', {
                url: '/inbox',
                templateUrl: 'apps/inbox/main.html',
                data : { title: 'Inbox'},
                controller: 'MainCtrl',
                resolve: load( ['apps/inbox/inbox.js','moment'] )
            })
            .state('app.inbox.list', {
                url: '/inbox/{fold}',
                templateUrl: 'apps/inbox/list.html',
                controller: 'ListCtrl'
            })
            .state('app.inbox.item', {
                url: '/{id:[0-9]{1,4}}',
                templateUrl: 'apps/inbox/item.html',
                controller: 'DetailCtrl'
            })
            .state('app.inbox.compose', {
                url: '/compose',
                templateUrl: 'apps/inbox/new.html',
                controller: 'NewCtrl',
                resolve: load( ['summernote', 'ui.select'] )
            })

            // widget router
            .state('app.widget', {
              url: '/widget',
              templateUrl: 'views/ui/widget.html',
              data : { title: 'Widgets' }
            })

            // ui router
            .state('app.ui', {
              url: '/ui',
              template: '<div ui-view></div>'
            })
              .state('app.ui.arrow', {
                url: '/arrow',
                templateUrl: 'views/ui/arrow.html',
                data : { title: 'Arrows' }
              })
              .state('app.ui.box', {
                url: '/box',
                templateUrl: 'views/ui/box.html',
                data : { title: 'Box' }
              })
              .state('app.ui.label', {
                url: '/label',
                templateUrl: 'views/ui/label.html',
                data : { title: 'Labels' }
              })
              .state('app.ui.button', {
                url: '/button',
                templateUrl: 'views/ui/button.html',
                data : { title: 'Buttons' }
              })
              .state('app.ui.color', {
                url: '/color',
                templateUrl: 'views/ui/color.html',
                data : { title: 'Colors' }
              })
              .state('app.ui.dropdown', {
                url: '/dropdown',
                templateUrl: 'views/ui/dropdown.html',
                data : { title: 'Dropdowns' }
              })
              .state('app.ui.grid', {
                url: '/grid',
                templateUrl: 'views/ui/grid.html',
                data : { title: 'Grids' }
              })
              .state('app.ui.icon', {
                url: '/icons',
                templateUrl: 'views/ui/icon.html',
                data : { title: 'Icons' }
              })
              .state('app.ui.list', {
                url: '/list',
                templateUrl: 'views/ui/list.html',
                data : { title: 'Lists' }
              })
              .state('app.ui.modal', {
                url: '/modal',
                templateUrl: 'views/ui/modal.html',
                data : { title: 'Modals' }
              })
              .state('app.ui.nav', {
                url: '/nav',
                templateUrl: 'views/ui/nav.html',
                data : { title: 'Navs' }
              })
              .state('app.ui.progress', {
                url: '/progress',
                templateUrl: 'views/ui/progress.html',
                data : { title: 'Progress' }
              })
              .state('app.ui.social', {
                url: '/social',
                templateUrl: 'views/ui/social.html',
                data : { title: 'Social' }
              })
              .state('app.ui.sortable', {
                url: '/sortable',
                templateUrl: 'views/ui/sortable.html',
                data : { title: 'Sortable' }
              })
              .state('app.ui.streamline', {
                url: '/streamline',
                templateUrl: 'views/ui/streamline.html',
                data : { title: 'Streamlines' }
              })
              .state('app.ui.timeline', {
                url: '/timeline',
                templateUrl: 'views/ui/timeline.html',
                data : { title: 'Timelines' }
              })
              .state('app.ui.angularstrap', {
                url: '/angularstrap',
                templateUrl: 'views/ui/ng.angularstrap.html',
                data : { title: 'AngularStrap' },
                resolve: load(['mgcrea.ngStrap','scripts/controllers/angularstrap.js'])
              })
              .state('app.ui.bootstrap', {
                url: '/bootstrap',
                templateUrl: 'views/ui/ng.bootstrap.html',
                data : { title: 'UI Bootstrap' },
                resolve: load(['ui.bootstrap','scripts/controllers/bootstrap.js'])
              })
              .state('app.googlemap', {
                url: '/googlemap',
                templateUrl: 'views/ui/map.google.html',
                data : { title: 'Gmap', hideFooter: true },
                controller: 'GoogleMapCtrl',
                //resolve: load(['ui.map', 'scripts/controllers/googlemap.js'], function(){ })
                resolve: load(['ui.map', 'scripts/controllers/load-google-maps.js', 'scripts/controllers/googlemap.js'], function(){ return loadGoogleMaps(); })
              })
              .state('app.ui.vectormap', {
                url: '/vectormap',
                templateUrl: 'views/ui/map.vector.html',
                data : { title: 'Vector Map' },
                controller: 'ChartCtrl',
                resolve: load('scripts/controllers/chart.js')
              })

            // form routers
            .state('app.form', {
              url: '/form',
              template: '<div ui-view></div>'
            })
              .state('app.form.layout', {
                url: '/layout',
                templateUrl: 'views/form/form.layout.html',
                data : { title: 'Layouts' }
              })
              .state('app.form.element', {
                url: '/element',
                templateUrl: 'views/form/form.element.html',
                data : { title: 'Elements' }
              })              
              .state('app.form.validation', {
                url: '/validation',
                templateUrl: 'views/form/ng.validation.html',
                data : { title: 'Validations' }
              })
              .state('app.form.select', {
                url: '/select',
                templateUrl: 'views/form/ng.select.html',
                data : { title: 'Selects' },
                controller: 'SelectCtrl',
                resolve: load(['ui.select','scripts/controllers/select.js'])
              })
              .state('app.form.editor', {
                url: '/editor',
                templateUrl: 'views/form/ng.editor.html',
                data : { title: 'Editor' },
                controller: 'EditorCtrl',
                resolve: load(['summernote','scripts/controllers/editor.js'])
              })
              .state('app.form.slider', {
                url: '/slider',
                templateUrl: 'views/form/ng.slider.html',
                data : { title: 'Slider' },
                controller: 'SliderCtrl',
                resolve: load(['vr.directives.slider','scripts/controllers/slider.js'])
              })
              .state('app.form.tree', {
                url: '/tree',
                templateUrl: 'views/form/ng.tree.html',
                data : { title: 'Tree' },
                controller: 'TreeCtrl',
                resolve: load(['angularBootstrapNavTree','scripts/controllers/tree.js'])
              })
              .state('app.form.file-upload', {
                url: '/file-upload',
                templateUrl: 'views/form/ng.file-upload.html',
                data : { title: 'File upload' },
                controller: 'UploadCtrl',
                resolve: load(['angularFileUpload', 'scripts/controllers/upload.js'])
              })
              .state('app.form.image-crop', {
                url: '/image-crop',
                templateUrl: 'views/form/ng.image-crop.html',
                data : { title: 'Image Crop' },
                controller: 'ImgCropCtrl',
                resolve: load(['ngImgCrop','scripts/controllers/imgcrop.js'])
              })
              .state('app.form.editable', {
                url: '/editable',
                templateUrl: 'views/form/ng.xeditable.html',
                data : { title: 'Xeditable' },
                controller: 'XeditableCtrl',
                resolve: load(['xeditable','scripts/controllers/xeditable.js'])
              })

            // table routers
            .state('app.table', {
              url: '/table',
              template: '<div ui-view></div>'
            })
              .state('app.table.static', {
                url: '/static',
                templateUrl: 'views/table/static.html',
                data : { title: 'Static' }
              })
              .state('app.table.datatable', {
                url: '/datatable',
                data : { title: 'Datatable' },
                templateUrl: 'views/table/datatable.html'
              })
              .state('app.table.footable', {
                url: '/footable',
                data : { title: 'Footable' },
                templateUrl: 'views/table/footable.html'
              })
              .state('app.table.smart', {
                url: '/smart',
                templateUrl: 'views/table/ng.smart.html',
                data : { title: 'Smart' },
                controller: 'TableCtrl',
                resolve: load(['smart-table', 'scripts/controllers/table.js'])
              })
              .state('app.table.uigrid', {
                url: '/uigrid',
                templateUrl: 'views/table/ng.uigrid.html',
                data : { title: 'UI Grid' },
                controller: "UiGridCtrl",
                resolve: load(['ui.grid', 'scripts/controllers/uigrid.js'])
              })
              .state('app.table.editable', {
                url: '/editable',
                templateUrl: 'views/table/ng.editable.html',
                data : { title: 'Editable' },
                controller: 'XeditableCtrl',
                resolve: load(['xeditable','scripts/controllers/xeditable.js'])
              })

            // chart
            .state('app.chart', {
              url: '/chart',
              templateUrl: 'views/chart/chart.html',
              data : { title: 'Charts' },
              controller: "ChartCtrl",
              resolve: load('scripts/controllers/chart.js')
            })
            .state('app.echarts', {
              url: '/echarts',
              template: '<div ui-view></div>'
            })
            .state('app.echarts.line', {
              url: '/line',
              templateUrl: 'views/chart/echarts-line.html',
              data : { title: 'Echarts Line' }
            })
            .state('app.echarts.bar', {
              url: '/bar',
              templateUrl: 'views/chart/echarts-bar.html',
              data : { title: 'Echarts Bar' }
            })
            .state('app.echarts.pie', {
              url: '/pie',
              templateUrl: 'views/chart/echarts-pie.html',
              data : { title: 'Echarts Pie' }
            })
            .state('app.echarts.scatter', {
              url: '/scatter',
              templateUrl: 'views/chart/echarts-scatter.html',
              data : { title: 'Echarts Scatter' }
            })
            .state('app.echarts.rc', {
              url: '/rc',
              templateUrl: 'views/chart/echarts-radar-chord.html',
              data : { title: 'Radar & Chord' }
            })
            .state('app.echarts.gf', {
              url: '/gf',
              templateUrl: 'views/chart/echarts-gauge-funnel.html',
              data : { title: 'Gauge & Funnel' }
            })
            .state('app.echarts.map', {
              url: '/map',
              templateUrl: 'views/chart/echarts-map.html',
              data : { title: 'Map' }
            })

          .state('app.page', {
            url: '/page',
            template: '<div ui-view></div>'
          })
            .state('app.page.profile', {
              url: '/profile',
              templateUrl: 'views/page/profile.html',
              data : { title: 'Profile' }
            })
            .state('app.page.setting', {
              url: '/setting',
              templateUrl: 'views/page/setting.html',
              controller: 'SettingsCtrl',
              data : { title: 'Setting' }
            })
            .state('app.page.search', {
              url: '/search',
              templateUrl: 'views/page/search.html',
              data : { title: 'Search' }
            })
            .state('app.page.faq', {
              url: '/faq',
              templateUrl: 'views/page/faq.html',
              data : { title: 'FAQ' }
            })
            .state('app.page.gallery', {
              url: '/gallery',
              templateUrl: 'views/page/gallery.html',
              data : { title: 'Gallery' }
            })
            .state('app.page.invoice', {
              url: '/invoice',
              templateUrl: 'views/page/invoice.html',
              data : { title: 'Invoice' }
            })
            .state('app.page.price', {
              url: '/price',
              templateUrl: 'views/page/price.html',
              data : { title: 'Price' }
            })
            .state('app.page.blank', {
              url: '/blank',
              templateUrl: 'views/page/blank.html',
              data : { title: 'Blank' }
            })
            .state('app.docs', {
              url: '/docs',
              templateUrl: 'views/page/docs.html',
              data : { title: 'Documents' }
            })
            .state('404', {
              url: '/404',
              templateUrl: 'views/misc/404.html'
            })
            .state('505', {
              url: '/505',
              templateUrl: 'views/misc/505.html'
            })
            .state('access', {
              url: '/access',
              template: '<div class="bg-auto w-full"><div ui-view class="fade-in-right-big smooth pos-rlt"></div></div>'
            })
            .state('access.signin', {
              url: '/signin',
              templateUrl: 'views/misc/signin.html', 
              controller: 'AuthController'
            })
            .state('access.signup', {
              url: '/signup',
              templateUrl: 'views/misc/signup.html', 
              controller: 'AuthController'
            })
            .state('access.confirm', {
              url: '/confirm/:code', 
              templateUrl: '/views/misc/confirm-account.html', 
              controller: 'confirmCtrl'
            })
            .state('access.select-user',{
              url: '/select-user', 
              templateUrl: 'views/pages/select-user.html',
              controller: 'LimboCtrl'
            })
            .state('access.forgot-password', {
              url: '/forgot-password',
              templateUrl: 'views/misc/forgot-password.html', 
              controller: 'forgotPasswordCtrl'
            })
            .state('change-password', {
              url: '/change-password/:code',
              templateUrl: 'views/pages/change-password.html',
              controller: 'forgotPasswordCtrl'
            })
            

            .state('access.lockme', {
              url: '/lockme',
              templateUrl: 'views/misc/lockme.html'
            });

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
                          src = module.module ? module.name : module.files;
                        }
                      });
                      return $ocLazyLoad.load(src);
                    } );
                  });
                  deferred.resolve();
                  return callback ? promise.then(function(){ return callback(); }) : promise;
              }]
          }
        }

        function getParams(name) {
            name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
            var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
            return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
        }
      }

