<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\UsersController;
use Cake\Event\Event;
use PhpParser\Node\Expr\Array_;
use Cake\ORM\TableRegistry;

class HomeController extends AppController
{
  public function beforeFilter(Event $event)
  {
    parent::beforeFilter($event);
    $this->Auth->allow(['index']);
  }

  public function index()
  {

  }
}
?>
