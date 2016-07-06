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
    $table = TableRegistry::get('Users');
    $users = $table
        ->find('all');
       
    
    $this->set('allusers', $users);
  }
}
?>
