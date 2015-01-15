'use strict';

/* jasmine specs for controllers go here */
describe('Kumu controllers', function() {

    beforeEach(function() {
        this.addMatchers({
            toEqualData: function(expected) {
                return angular.equals(this.actual, expected);
            }
        });
    });

    beforeEach(module('kumuApp'));
    beforeEach(module('kumuServices'));

    describe('ListController', function() {
        var scope, ctrl, $httpBackend;

        beforeEach(inject(function(_$httpBackend_, $rootScope, $controller) {
            $httpBackend = _$httpBackend_;
            $httpBackend.expectGET('sources/servies.json').


            respond([{
                servicename: "plexmediaserver",
                ref: "http://192.168.1.44:32400/web",
                title: "Plex",
                icon: "plex.png"
            }, {
                servicename: "transmission",
                ref: "http://192.168.1.44:9091/",
                title: "Transmission",
                icon: "transmission.png"
            }]);

            //$scope, $interval, $q, $http, Servicelisting, Server
            scope = $rootScope.$new();
            ctrl = $controller('ListController', {
                $scope: scope
            });
        }));


        it('should create "servies" model with service definitions fetched from sources/servies.json', function() {
            
            //$httpBackend.flush();

            // expect(scope.servies).toEqualData(
            //     [{servicename:"plexmediaserver",ref:"http://192.168.1.44:32400/web",title:"Plex",icon:"plex.png"},{servicename:"transmission",ref:"http://192.168.1.44:9091/",title:"Transmission",icon:"transmission.png"}]);
            // });

        });


    });
});