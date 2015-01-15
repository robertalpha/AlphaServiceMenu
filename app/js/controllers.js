'use strict';

/* Controllers */

var kumuControllers = angular.module('kumuControllers', []);


kumuControllers.controller('ListController', ['$scope', '$interval', '$q', '$http', 'Servicelisting', 'Server',
    function($scope, $interval, $q, $http, Servicelisting, Server) {

        $scope.getClass = function(serv) {
            if (serv.loaded && serv.active) {
                return 'kumservice btn btn-success';
            } else if (serv.loaded && !serv.active) {
                return 'kumservice btn btn-danger';
            } else if (!serv.loaded) {
                return 'kumservice btn';
            }
        }

        var runner = function(value, key) {
            $scope.servies[key].loaded = false;
            $scope.servies[key].active = false;

            Server.fetch(value.servicename).then(function(data) {
                var response = data[2];
                $scope.servies[key].loaded = true;
                if (response.indexOf("Active: active (running) since") > -1) {
                    $scope.servies[key].active = true;
                }
                $scope.servies[key].response = response;
            });
        }

        Servicelisting.fetch().then(function(data) {
            $scope.servies = data;

        }).then(function() {
            angular.forEach($scope.servies, function(value, key) {

                runner(value, key);
                $interval(function() {
                    runner(value, key)
                }, 60000, 0);
            });
        });
    }
]);