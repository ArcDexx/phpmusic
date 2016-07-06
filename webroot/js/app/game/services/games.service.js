(function () {
    'use strict';

    angular
        .module('quizzr.games.services')
        .factory('Games', Games);

    Games.$inject = ['$cookies', '$http'];

    function Games($cookies, $http) {
        var Games = {
            getGames: getGames,
        };

        return Games;


    }
})();