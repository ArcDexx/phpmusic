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


    public function get_user_by_points()
    {
        $users = $this->Users
            ->find('all')
            ->order(['total_score' => 'DESC']);
        $this->set(compact('users'));
        $this->set('_serialize', array('users'));
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

        if ($this->Users->save($data))
          $this->redirect(array('controller' => 'home', 'action' => 'index'));
        else
          $message = 'Error';

        $this->set(compact('message'));
        $this->set('_serialize', array('message'));
    }

    public function disconnect()
    {
      $this->request->session()->delete('isLogged');

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
        $this->request->session()->write('login', $user->login);
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
    public function edit($id)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
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
