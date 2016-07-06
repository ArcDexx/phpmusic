(function () {
    'use strict';

    angular
        .module('quizzr.nav.controllers')
        .controller('NavigationController', NavigationController);

    NavigationController.$inject = ['$location', '$scope', 'Login'];

    function NavigationController($location, $scope, Login) {
        var vm = this;

        vm.login = login;

        activate();

        function activate() {
            if (Login.isAuthenticated()) {
                $location.url('/');
            }
        }

        function login() {
            Login.login(vm.email, vm.password);
        }
    }
})();