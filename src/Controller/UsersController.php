<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */

    public function index()
    {
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $data = new User($this->request->data);
        $data->is_guest = false;

        if ($this->request->data['password'] !== $this->request->data['password_confirm'])
          $this->redirect(array('controller' => 'signup', 'action' => 'index', 'failpass' => '1'));
        else if ($this->request->data['email'] !== $this->request->data['email_confirm'])
          $this->redirect(array('controller' => 'signup', 'action' => 'index', 'failmail' => '1'));


        if ($this->Users->save($data))
          $this->redirect(array('controller' => 'home', 'action' => 'index'));
        else
          $this->redirect(array('controller' => 'signup', 'action' => 'index', 'fail' => '1'));
    }

    public function register()
    {
        $user = $this->Users->newEntity();
        $user->email = $this->request->data['email'];
        $user->image = $this->request->data['url'];
        $user->password = $this->request->data['password'];
        $user->login = $this->request->data['login'];
        $user->is_guest = 0;
        if ($this->Users->save($user))
            $this->redirect(array('controller' => 'home', 'action' => 'index'));
        else
            $this->redirect(array('controller' => 'signup', 'action' => 'index', 'fail' => '1'));
    }

    public function disconnect()
    {
      $this->request->session()->delete('isLogged');
      $this->request->session()->delete('login');
      $this->request->session()->delete('id');
      $this->request->session()->delete('image');
      $this->request->session()->delete('total_score');
      $this->request->session()->delete('games_won');
      $this->request->session()->delete('games_played');

      $this->redirect(array('controller' => 'home', 'action' => 'index'));
    }

    public function login()
    {
      $user = new User($this->request->data);

      $data = $this->Users
                ->find()
                ->where(['login' => $user->login, 'password' => $user->password])
                ->first();

      if (isset($data)){
        $this->request->session()->write('isLogged', 'true');
        $this->request->session()->write('login', $data->login);
        $this->request->session()->write('id', $data->id);
        $this->request->session()->write('image', $data->image);
        $this->request->session()->write('total_score', $data->total_score);
        $this->request->session()->write('games_won', $data->games_won);
        $this->request->session()->write('games_played', $data->games_played);
        $this->redirect(array('controller' => 'home', 'action' => 'index'));
      }

      $this->redirect(array('controller' => 'login', 'action' => 'index', 'fail' => '1'));
    }
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if (isset($this->request->data['image']))
          $this->request->session()->write('image', $this->request->data['image']);

        $user = $this->Users->get($this->request->session()->read('id'), [
            'contain' => []
          ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                $this->redirect(array('controller' => 'account', 'action' => 'index', 'success' => '1'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
