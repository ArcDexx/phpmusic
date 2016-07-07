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

  }

  private function checkinput($input, $expected)
  {
    $percent;
    similar_text($input, $expected, $percent);

    return $percent;
  }
}
?>
