<?php
namespace App\Controller;

use App\Controller\AppController;

class AccountController extends AppController
{
  public function index()
  {
    if (!$this->request->session()->read("isLogged") == 'true')
        $this->redirect(array('controller' => 'home', 'action' => 'index'));
  }
}
?>
