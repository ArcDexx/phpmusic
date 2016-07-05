(function () {
  'use strict';

  angular
    .module('quizzr.login', [
      'quizzr.login.controllers',
        'quizzr.login.services',
		'quizzr.login.directives'
    ]);

  angular
    .module('quizzr.login.controllers', []);

    angular
    .module('quizzr.login.services', ['ngCookies']);
	
	angular
    .module('quizzr.login.directives', []);

})();