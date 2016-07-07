<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotAcceptableException;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;


class LoginController extends AppController
{
  public function beforeFilter(Event $event)
  {
    parent::beforeFilter($event);
    $this->Auth->allow(['index', 'register', 'logout']);
  }

  public function index()
  {
    $this->loadModel('Users');
    try {
      if(!isset($this->request->data['login'])){
        throw new UnauthorizedException("Please enter your username");
      }
      if(!isset($this->request->data['password'])){
        throw new UnauthorizedException("Please enter your password");
      }
      $login  = $this->request->data['login'];
      $password  = $this->request->data['password'];

      // Check for user credentials
      $user = $this->Users->find()->where(['login' => $login, 'password' => $password])->first();
      if(!$user) {
        throw new UnauthorizedException("Invalid login");
      }


      $token =  Security::hash($user->id.$user->login, 'sha1', true);

      $this->request->session()->write('Auth.User.token', $token);

      $this->response->header('Authorization', 'Bearer ' . $token);

      $user['token']=$token;

      $this->Auth->setUser($user->toArray());
      
    } catch (UnauthorizedException $e) {
      throw new UnauthorizedException($e->getMessage(), 401);
    }

    $this->set('user', $this->Auth->user());
    $this->set('_serialize', ['user']);
  }

  public function register() {
    $this->loadModel('Users');
    $user = $this->Users->newEntity();
    $user->email = $this->request->data['email'];
    $user->image = $this->request->data['url'];
    $user->password = $this->request->data['password'];
    $user->login = $this->request->data['login'];
    $user->is_guest = 0;
    if($this->Users->save($user)) {

      $this->set('user', $user);
      $this->set('_serialize', ['user']);
    } else {
      throw new NotAcceptableException("Nope", 406);
    }
  }
  /**
   * Logout user
   * API URL  /api/login method: DELETE
   * @return json response
   */
  public function logout()
  {
    $this->Auth->logout();
    $this->set('message', 'You were logged out');
    $this->set('_serialize', ['message']);
  }
}
?>
