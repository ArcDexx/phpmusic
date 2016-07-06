<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\UsersController;
use PhpParser\Node\Expr\Array_;
use Cake\ORM\TableRegistry;

class HomeController extends AppController
{


  public function index()
  {
    $user_table = TableRegistry::get('Users');
    $users = $user_table
        ->find('all')
        ->order(['total_score' => 'DESC']);
    $this->set('allusers', $users);
    $game_table = TableRegistry::get('games');
    $games = $game_table
        ->find('all');
    $this->set('allgames', $games);

  }
}
?>
