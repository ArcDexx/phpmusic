(function () {
  'use strict';

  angular
    .module('quizzr.config')
    .config(config);

  config.$inject = ['$locationProvider'];
  
  function config($locationProvider, $mdThemingProvider) {
    $locationProvider.html5Mode(true);
    $locationProvider.hashPrefix('!');
  }
})();