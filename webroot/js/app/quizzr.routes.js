(function () {
    'use strict';

    angular
        .module('quizzr.routes')
        .config(config);

    config.$inject = ['$routeProvider'];
    // Route definitions

    function config($routeProvider) {
        $routeProvider.when('/login', {
            controller: 'LoginController',
            controllerAs: 'vm',
            templateUrl: '/templates/login.html'
        }).otherwise('/');
    }
})();