(function () {
  'use strict';

  angular
    .module('quizzr.login.services')
    .factory('Login', Login);

  Login.$inject = ['$cookies', '$http'];
  
  function Login($cookies, $http) {
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
      return $http.post('users/login', {
        login: login, password: password
      }).then(loginSuccessFn, loginErrorFn);

      function loginSuccessFn(data, status, headers, config) {
        Login.setAuthenticatedAccount(data.data);
        window.location = '/';
      }

      function loginErrorFn(data, status, headers, config) {
        console.error('Failed');
      }
    }

    function getAuthenticatedAccount() {
      if (!$cookies.get('account')) {
        return;
      }

      return JSON.parse($cookies.get('account'));
    }

    function isAuthenticated() {
      return !!$cookies.get('account');
    }

    function setAuthenticatedAccount(account) {
      $cookies.put('account', JSON.stringify(account));
    }

    function unauthenticate() {
      $cookies.remove('account');
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

        window.location = '/';
      }

      function logoutErrorFn(data, status, headers, config) {
        console.error('Epic failure!');
      }
    }
  }
})();