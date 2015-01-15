'use strict';

/* Services */

var kumuServices = angular.module('kumuServices', ['ngResource']);

kumuServices.factory('Servicelisting', function($q, $timeout, $http) {
    var Servicelisting = {
        fetch: function() {

            var deferred = $q.defer();

            $timeout(function() {
                $http.get('sources/servies.json').success(function(data) {
                    deferred.resolve(data);
                });
            }, 0);

            return deferred.promise;
        }
    }
    return Servicelisting;
}).factory('Server', function($q, $timeout, $http) {
    var Output = {
        fetch: function($servicename) {

            var deferred = $q.defer();

            $timeout(function() {
                $http.get('serverside/?process='+$servicename).success(function(data) {
                    deferred.resolve(data);
                });
            }, 0);

            return deferred.promise;
        }
    }
    return Output;
});