(function () {
    'use strict';

    angular
        .module('quizzr', [
            'quizzr.config',
            'quizzr.routes',
            'quizzr.login',
            'quizzr.nav',
            'quizzr.game',
            'quizzr.utils',
            'quizzr.audio'
        ]);

    angular
        .module('quizzr.config', []);

    angular
        .module('quizzr.routes', ['ngRoute']);

    angular
        .module('quizzr')
        .run(run);


    run.$inject = ['$http'];

    function run($http) {
        $http.defaults.xsrfHeaderName = 'X-CSRFToken';
        $http.defaults.xsrfCookieName = 'csrftoken';
    }
})();