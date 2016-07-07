(function () {
    'use strict';

    angular
        .module('quizzr.games.services')
        .factory('Games', Games);

    Games.$inject = ['$cookies', '$http'];

    function Games($cookies, $http) {
        var Games = {
            getGames: getGames,
            getRankings: getRankings,
            getGameById: getGameById,
            trySubmit: trySubmit,
            startNewGame: startNewGame
        };

        function trySubmit(submitArtist, id) {
            return $http.post('/games/submit.json', {submitArtist: submitArtist, gameId: id})
        }

        function startNewGame(game) {
            return $http.post('/games/add.json', {game: game});
        }

        function getGames() {
            return $http.get('/games.json');
        }

        function getRankings() {
            return $http.get('/rankings.json');
        }

        function getGameById(id) {
            return $http.get('/games/' + id + ".json");
        }

        return Games;


    }
})();
