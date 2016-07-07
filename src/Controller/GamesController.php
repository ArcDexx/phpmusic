<?php
namespace App\Controller;

use App\Controller\AppController;


/**
 * Games Controller
 *
 * @property \App\Model\Table\GamesTable $Games
 */
class GamesController extends AppController
{
    public $uses=array('User','Sample');

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
        $games = $this->paginate($this->Games);
        $this->set(compact('games'));
        $this->set('_serialize', ['games']);
    }

    /**
     * View method
     *
     * @param string|null $id Game id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function view($id = null)
    {
        $game = $this->Games->get($id, [
            'contain' => ['Samples']
        ]);

        if ($game->start_time == null) {
            $date = new \DateTime(null, new \DateTimeZone('Europe/Paris'));
            $game->start_time = $date->getTimestamp();
            $this->Games->save($game);
        }

        $this->set(compact('game'));
        $this->set('_serialize', 'game');
    }


    public function get_all()
    {
        $games = $this->Games
            ->find('all');
        $this->set(compact('games'));
        $this->set('_serialize', array('games'));
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Samples');
        $this->loadModel('GamesSamples');

        if ($this->request->is('post')) {
            $data=$this->request->input('json_decode')->game;
            $game = $this->Games->find('all')->where(['Games.genre' => $data->genre])->order('id DESC')->contain(['Samples'])->first();
            $date = new \DateTime(null, new \DateTimeZone('Europe/Paris'));

            if ($game->start_time != null && $date->getTimestamp() - $game->start_time->getTimestamp() > (count($game->samples) * (15+5) + 30)) {
                $game = $this->Games->newEntity();
                $game->start_time = null;
                $game->genre = $data->genre;
                $game->current_sample = 0;
                $game->current_first = 0;
                $game->current_second = 0;
                $game->current_third = 0;
                $game->nb_players = 0;

                if ($this->Games->save($game)) {
                    $this->set(compact('game'));
                    $this->set('_serialize', ['game']);
                } else {
                    $this->Flash->error(__('The game could not be saved. Please, try again.'));
                }

                $samples = $this->Samples->find('all')->where(['Samples.genre' => $game->genre])
                    ->order('rand()')
                    ->limit(15);

                foreach ($samples as $sample) {
                    $gameSample = $this->GamesSamples->newEntity();
                    $gameSample->sample_id = $sample->id;
                    $gameSample->game_id = $game->id;

                    if ($this->GamesSamples->save($gameSample)) {

                    } else {
                        $this->Flash->error(__('The game could not be saved. Please, try again.'));
                    }
                }
                $this->set(compact('game'));
                $this->set('_serialize', ['game']);
           } else {
                $this->set(compact('game'));
                $this->set('_serialize', ['game']);
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Game id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $game = $this->Games->get($id, [
            'contain' => ['Samples', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $game = $this->Games->patchEntity($game, $this->request->data);
            if ($this->Games->save($game)) {
                $this->Flash->success(__('The game has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The game could not be saved. Please, try again.'));
            }
        }
        $samples = $this->Games->Samples->find('list', ['limit' => 200]);
        $users = $this->Games->Users->find('list', ['limit' => 200]);
        $this->set(compact('game', 'samples', 'users'));
        $this->set('_serialize', ['game']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Game id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $game = $this->Games->get($id);
        if ($this->Games->delete($game)) {
            $this->Flash->success(__('The game has been deleted.'));
        } else {
            $this->Flash->error(__('The game could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    private function getCurrentSample($game) {
      $date = new \DateTime(null, new \DateTimeZone('Europe/Paris'));
      $id = floor(($date->getTimestamp() - $game->start_time->getTimestamp()) / ((15 + 5)));
      if ($id <= count($game->samples))
      {
        return $game->samples[$id];
      } else {
        return -1;
      }
  }

public function submit()
{
  $text = $this->request->data['submitArtist'];
  $userId = 1;
  $gameId = $this->request->data['gameId'];

  $this->findArtistTitle($text, $userId, $gameId);
}

  public function findArtistTitle($text, $userId, $gameId)
  {
    $this->loadModel('Samples');
    $this->loadModel('Games');
    $this->loadModel('GamesUsers');
    $this->loadModel('GamesSamples');
    $this->loadModel('GameAnswers');
    $game = $this->Games->find('all')->contain(['Samples'])->where(['id' => $gameId])->first();

    $gameUser = $this->GamesUsers->find('all')->where(['game_id' => $gameId, 'user_id' => $userId]);
    $Sample = $this->getCurrentSample($game);

    $answer = $this->GameAnswers->find('all')->where(['sample_id' => $Sample->id, 'game_user_id' => $gameUser->id])->first();

    if ($answer == null) {
      $answer = $this->GameAnswers->newEntity();
    }

    if ($this->checkinput($text, $Sample->artist) > 80)
    {
      $answer->artist = true;
    }

    if ($this->checkinput($text, $Sample->title) > 80)
    {
      $answer->title = true;
    }

    $this->set(compact('answer'));
    $this->set('_serialize', ['answer']);
  }

    public function checkinput($input, $expected)
    {
      $percent;
      similar_text($input, $expected, $percent);

      return $percent;
    }
}
