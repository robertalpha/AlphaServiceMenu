'use strict';

/* Services */

var kumuServices = angular.module('kumuServices', ['ngResource']);

kumuServices.factory('Servicelisting', function($q, $timeout, $http) {
    var Servicelisting = {
        fetch: function() {

            var deferred = $q.defer();

            $timeout(function() {
                $http.get('server/?request=config').success(function(data) {
                    deferred.resolve(data);
                });
            }, 0);

            return deferred.promise;
        }
    }
    return Servicelisting;
}).factory('Server', function($q, $timeout, $http) {
    var Output = {
        fetch: function($service,$hostbase) {

            var deferred = $q.defer();

            $timeout(function() {
                $http.get($hostbase+'/server/?process='+$service).success(function(data) {
                    deferred.resolve(data);
                }).error(function(data, status, headers, config) {
                    var response = {running:"server down"};
                    deferred.resolve(response);
                  });
            }, 0);

            return deferred.promise;
        }
    }
    return Output;
});