(function () {
    'use strict';

    angular
        .module('quizzr.games.controllers')
        .controller('GamesController', GamesController);

    GamesController.$inject = ['$location', '$scope', '$routeParams', 'Utils', 'Games', 'Audio'];

    function GamesController($location, $scope, $routeParams, Utils, Games, Audio) {
        var vm = this;

        var songDuration = 15;
        var pauseDuration = 5;
        var endPauseDuration = 30;

        activate();

        vm.trySubmit = trySubmit;

        function trySubmit() {
            Games.submitArtist($scope.submitArtist);
        }

        function startNewGame() {
            Games.startNewGame($scope.currentGame).then(function(result) {
                var data = result.data;
                $location.path("/game/" + data.game.id);
            }, function (result) {
                //FIXME : Launch default modal error window with message
            });
        }

        function loadGames() {
            Games.getGames().then(function(result) {
                $scope.games = result.data.games;
            }, function(data){
                //FIXME : Launch default modal error window with message
            });
        }

        function loadRankings() {
            Games.getRankings().then(function(result) {
                $scope.rankings = result.data.rankings;
            }, function() {
                //FIXME : Launch default modal error window with message
            })
        }

        function loadCurrentSample() {
            var newSample = Math.floor(($scope.time - $scope.initTime) / (songDuration + pauseDuration));
            if (newSample != $scope.currentSample) {
                $scope.currentSample = newSample;
                if ($scope.currentSample >= 0 && $scope.currentSample < $scope.totalNb) {
                    $scope.currentAudio = $scope.samples[$scope.currentSample].sample;
                    Audio.play("/songs/hits/" + $scope.currentAudio);
                }
                else
                    $scope.currentAudio = undefined;
            }
            $scope.percentProgress = Math.min(100, Math.round(($scope.time - $scope.initTime) / (($scope.initTime + $scope.samples.length * (songDuration + pauseDuration)) - $scope.initTime) * 100));
        }

        function loadGameById() {
            if ($routeParams.id !== undefined) {
                Games.getGameById($routeParams.id).then(function(result) {
                    var data = result.data;
                    $scope.currentGame = data;
                    $scope.started = true;
                    $scope.time = (new Date().getTime() / 1000);
                    $scope.initTime = (new Date(data.start_time).getTime() / 1000);
                    $scope.samples = data.samples;
                    $scope.totalNb = $scope.samples.length;
                    $scope.nextGame = Math.floor(Math.max(0, $scope.initTime + $scope.samples.length * (songDuration + pauseDuration) + endPauseDuration - $scope.time));

                    if ($scope.time > $scope.initTime + $scope.samples.length * (songDuration + pauseDuration)) {
                        $scope.percentProgress = 100;
                        if ($scope.time > $scope.initTime + $scope.samples.length * (songDuration + pauseDuration) + endPauseDuration) {
                            startNewGame();
                        }
                    } else {
                        loadCurrentSample();
                    }
                }, function(data) {
                    //FIXME : Launch default modal error window with message
                })
            }

            if ($scope.started == true) {
                if ($scope.time > $scope.initTime + $scope.samples.length * (songDuration + pauseDuration) + endPauseDuration) {
                    $scope.percentProgress = 100;
                    //FIXME : Launch default modal error window with message "This game as already ended"//
                    startNewGame();
                } else {
                    loadCurrentSample();
                }
            }
        }

        function activate() {
            $scope.started = false;
            loadGames();
            loadRankings();
            loadGameById();
            Utils.refresh(5, loadGames);
            Utils.refresh(5, loadRankings);
            Utils.refresh(1, loadGameById);
        }
    }
})();