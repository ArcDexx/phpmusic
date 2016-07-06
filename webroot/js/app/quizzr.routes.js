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
        }).when('/games', {
            controller: 'GamesController',
            controllerAs: 'vm',
            templateUrl: '/templates/games.html'
        }).when('/game/:id', {
            controller: 'GamesController',
            controllerAs: 'vm',
            templateUrl: '/templates/game.html'
        }).when('/',
        {
            controller: 'GamesController',
            controllerAs: 'vm',
            templateUrl: '/templates/games.html'
        }).when('/signIn',
            {
                controller: 'SigninController',
                controllerAs: 'vm',
                templateUrl: '/templates/inscription.html'
            })
            .when('/account',
            {
                controller: 'SigninController',
                controllerAs: 'vm',
                templateUrl: '/templates/Account.html'
            });
    }
})();