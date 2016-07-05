(function () {
    'use strict';

    angular
        .module('quizzr', [
            'quizzr.config',
            'quizzr.routes',
            'quizzr.login',
            'quizzr.nav',
			'quizzr.game'
        ]);

    angular
        .module('quizzr.config', []);

    angular
        .module('quizzr.routes', ['ngRoute']);

    angular
        .module('quizzr')
        .run(run);


    run.$inject = ['$http'];

    function run($http, $templateCache) {
        $http.defaults.xsrfHeaderName = 'X-CSRFToken';
        $http.defaults.xsrfCookieName = 'csrftoken';
    }
})();