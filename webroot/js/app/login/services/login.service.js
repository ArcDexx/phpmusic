(function () {
  'use strict';

  angular
    .module('quizzr.login.services')
    .factory('Login', Login);

  Login.$inject = ['$cookies', '$http', '$location'];
  
  function Login($cookies, $http, $location) {
    var Login = {
      getAuthenticatedAccount: getAuthenticatedAccount,
      isAuthenticated: isAuthenticated,
      login: login,
      register: register,
      setAuthenticatedAccount: setAuthenticatedAccount,
      unauthenticate: unauthenticate,
      logout: logout
    };

    return Login;

    function login(login, password) {
      return $http.post('login/index.json', {
        login: login, password: password
      }).then(loginSuccessFn, loginErrorFn);

      function loginSuccessFn(data, status, headers, config) {
        Login.setAuthenticatedAccount(data.data);
      }

      function loginErrorFn(data, status, headers, config) {
        console.log('LOGIN Failed');
      }
    }

    function getAuthenticatedAccount() {
      if (!$cookies.get('account')) {
        return;
      }

      return JSON.parse($cookies.get('account'));
    }

    function isAuthenticated() {
      if ($cookies.get('token') && $cookies.get('id'))
          return true;
      else
          return false;
    }

    function setAuthenticatedAccount(data) {
      $cookies.put('token', data.user.token);
      $cookies.put('id', data.user.id);
      $location.url('/games');
    }

    function unauthenticate() {
    }
    
    function register(login, url, email, password) {
      return $http.post('/users/register', {
        login: login,
        url: url,
        email: email,
        password: password
      }).then(function (data) {
        login(login, password)
      },function (data) {
      } );
      
      function registerSuccessFn(data, status, headers, config) {
        Login.login(login, password);
      }
      
      function registerErrorFn(data, status, headers, config) {
        console.error('Failed');
      }
    }

    function logout() {
      return $http.post('/app/webroot/logout')
          .then(logoutSuccessFn, logoutErrorFn);
      
      function logoutSuccessFn(data, status, headers, config) {
        Login.unauthenticate();
      }

      function logoutErrorFn(data, status, headers, config) {
        console.error('Epic failure!');
      }
    }
  }
})();