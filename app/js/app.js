'use strict';

/* App Module */

var kumuApp = angular.module('kumuApp', [
  'ngRoute',
  'kumuControllers',
  'kumuServices'
]);

kumuApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/', {
        templateUrl: 'partials/list.html',
        controller: 'ListController'
      }).
      otherwise({
        redirectTo: '/'
      });
  }]);
