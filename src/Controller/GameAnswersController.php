<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GameAnswers Controller
 *
 * @property \App\Model\Table\GameAnswersTable $GameAnswers
 */
class GameAnswersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['GameUsers', 'Samples']
        ];
        $gameAnswers = $this->paginate($this->GameAnswers);

        $this->set(compact('gameAnswers'));
        $this->set('_serialize', ['gameAnswers']);
    }

    /**
     * View method
     *
     * @param string|null $id Game Answer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gameAnswer = $this->GameAnswers->get($id, [
            'contain' => ['GameUsers', 'Samples']
        ]);

        $this->set('gameAnswer', $gameAnswer);
        $this->set('_serialize', ['gameAnswer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gameAnswer = $this->GameAnswers->newEntity();
        if ($this->request->is('post')) {
            $gameAnswer = $this->GameAnswers->patchEntity($gameAnswer, $this->request->data);
            if ($this->GameAnswers->save($gameAnswer)) {
                $this->Flash->success(__('The game answer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The game answer could not be saved. Please, try again.'));
            }
        }
        $gameUsers = $this->GameAnswers->GameUsers->find('list', ['limit' => 200]);
        $samples = $this->GameAnswers->Samples->find('list', ['limit' => 200]);
        $this->set(compact('gameAnswer', 'gameUsers', 'samples'));
        $this->set('_serialize', ['gameAnswer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Game Answer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gameAnswer = $this->GameAnswers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gameAnswer = $this->GameAnswers->patchEntity($gameAnswer, $this->request->data);
            if ($this->GameAnswers->save($gameAnswer)) {
                $this->Flash->success(__('The game answer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The game answer could not be saved. Please, try again.'));
            }
        }
        $gameUsers = $this->GameAnswers->GameUsers->find('list', ['limit' => 200]);
        $samples = $this->GameAnswers->Samples->find('list', ['limit' => 200]);
        $this->set(compact('gameAnswer', 'gameUsers', 'samples'));
        $this->set('_serialize', ['gameAnswer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Game Answer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gameAnswer = $this->GameAnswers->get($id);
        if ($this->GameAnswers->delete($gameAnswer)) {
            $this->Flash->success(__('The game answer has been deleted.'));
        } else {
            $this->Flash->error(__('The game answer could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
