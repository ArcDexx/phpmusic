(function () {
    'use strict';

    angular
        .module('quizzr.games.controllers')
        .controller('GamesController', GamesController);

    GamesController.$inject = ['$location', '$scope', 'Games'];

    function GamesController($location, $scope, Games) {
        var vm = this;

        activate();

        function activate() {

        }
    }
})();