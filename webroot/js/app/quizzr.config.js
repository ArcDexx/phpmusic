(function () {
  'use strict';

  angular
    .module('quizzr.config')
    .config(config);

  config.$inject = ['$locationProvider', '$httpProvider'];
  
  function config($locationProvider, $httpProvider) {
    $httpProvider.interceptors.push('authInterceptor');
  }
})();