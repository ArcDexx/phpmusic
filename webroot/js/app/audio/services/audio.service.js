(function () {
    'use strict';

    angular
        .module('quizzr.audio.services')
        .factory('Audio', Audio);

    Audio.$inject = ['$document'];

    function Audio($document) {
        var audioElement = $document[0].createElement('audio');
        return {
            audioElement: audioElement,

            play: function(filepath) {
                audioElement.src = filepath;
                audioElement.play();
            }
        }
    }
})();