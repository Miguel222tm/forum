/**
 * @ngdoc overview
 * @name app
 * @description
 * # app
 *
 * Main module of the application.
 */

    angular
      .module('app', [
        'UURootService',
        'ngAnimate',
        'ngAria',
        'ngResource',
        'ngSanitize',
        'ngTouch',
        'ngMaterial',
        'ngStorage',
        'ngStore',
        'ui.router',
        'ui.utils',
        'ui.load',
        'ui.jp',
        'oc.lazyLoad',
        'satellizer',
        'growlNotifications'
      ]);
