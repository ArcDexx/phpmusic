(function () {
    'use strict';

    angular
        .module('quizzr.routes')
        .config(config);

    config.$inject = ['$routeProvider'];
    // Route definitions

    function config($routeProvider) {
        $routeProvider.when('/register', {
            controller: 'RegisterController',
            controllerAs: 'vm',
            templateUrl: '/static/templates/login/register.html'
        }).otherwise('/');
    }
})();