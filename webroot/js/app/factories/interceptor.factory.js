/*
 *
 * Auth interceptor factory
 *
 */


'user strict';
(function() {

    angular.module( 'quizzr.factories' )
        .factory( 'authInterceptor', authInterceptor );

    authInterceptor.$inject = ['$q', '$location', '$timeout', '$injector', '$cookies'];

    function authInterceptor($q, $location, $timeout, $injector, $cookies) {
        var factory = {
            request : request,
            responseError : responseError,
            response : response
        };

        return factory;

        //////////////////////////////

        /**
         * Request
         * @param object config
         * @returns object
         */
        function request( config ) {

            config.headers = config.headers || { }
            var token;

            if ( $cookies.get('token') ) {
                token = $cookies.get('token');
            }

            if ( token ) {
                config.headers.Authorization = 'Bearer ' + token;
            }

            return config;

        };

        /**
         * Response Error
         * @param object response
         * @returns object
         */
        function responseError( response ) {

            if ( response.status === 403 ) {
                $timeout(function () {
                    $cookies.remove('token');
                    $cookies.remove('id');
                    $location.url('/login');
                })
            }

            if ( response.status === 401 ) {
                $timeout(function () {
                    $cookies.remove('token');
                    $cookies.remove('id');
                    $location.url('/login');
                })
            }

            return $q.reject( response );
        };

        /**
         * Response
         * @param object response
         * @returns object
         */
        function response( response ) {

            return response;
        }
    }


})();