(function () {
  'use strict';

  angular
    .module('quizzr.login.controllers')
    .controller('LoginController', LoginController);

  LoginController.$inject = ['$location', '$scope', 'Login'];
  
  function LoginController($location, $scope, Login) {
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