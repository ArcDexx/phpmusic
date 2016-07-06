(function () {
  'use strict';

  angular
    .module('quizzr.login', [
      'quizzr.login.controllers',
        'quizzr.login.services'
    ]);

  angular
    .module('quizzr.login.controllers', []);

    angular
    .module('quizzr.login.services', ['ngCookies']);
})();