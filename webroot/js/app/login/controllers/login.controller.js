(function () {
  'use strict';

  angular
    .module('quizzr.login.controllers')
    .controller('LoginController', LoginController);

  LoginController.$inject = ['$location', '$scope', 'Login'];
  
  function LoginController($location, $scope, Login) {
    var vm = this;

    vm.signin = signin;

    activate();
    
    function activate() {
      if (Login.isAuthenticated()) {
        $location.url('/');
      }
    }
    
    function signin() {
      Login.login(vm.login, vm.password);
    }
    
    function signup() {
      Login.register()
    }
  }
})();