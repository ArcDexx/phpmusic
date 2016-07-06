(function () {
    'use strict';

    angular
        .module('quizzr.functions.utils')
        .factory('Utils', Utils);

    Utils.$inject = ['$timeout'];

    function Utils($timeout) {
        var Utils = {
            refresh: refresh
        };

        function refresh(time, callback) {
            $timeout(function () {
                callback();
                refresh(time, callback);
            }, time * 1000, time * 1000);
        }

        return Utils;
    }
})();