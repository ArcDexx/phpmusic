(function () {
  'use strict';

  angular
    .module('quizzr.game', [
      'quizzr.game.controllers',
        'quizzr.game.services',
		'quizzr.game.directives'
    ]);

  angular
    .module('quizzr.game.controllers', []);

    angular
    .module('quizzr.game.services', []);
	
	angular
    .module('quizzr.game.directives', []);

})();