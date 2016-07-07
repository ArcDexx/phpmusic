<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use App\Test\TestCase\Controller\UsersControllerTest;
use Cake\TestSuite\IntegrationTestCase;
use App\Model\Entity\User;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
      $this->get('/users');

      $this->assertResponseOk();
    }

    public function testLogin()
    {
      $controller = new UsersController();

      $user = new User();

      $data = $controller->Users->find()->first();

      $user->login = $data->login;

      $result = $controller->Users->save($user);

      $this->assertFalse($result);
    }
}
