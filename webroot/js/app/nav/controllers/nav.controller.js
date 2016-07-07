(function () {
    'use strict';

    angular
        .module('quizzr.nav.controllers')
        .controller('NavigationController', NavigationController);

    NavigationController.$inject = ['$location', '$scope', 'Login'];

    function NavigationController($location, $scope, Login) {
        var vm = this;

        vm.login = login;
        vm.isAuthenticated = isAuthenticated;
        vm.logout = logout;

        activate();

        function logout() {
            Login.logout();
        }

        function isAuthenticated() {
            vm.currentUser = Login.getAuthenticatedAccount();
            return Login.isAuthenticated();
        }

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