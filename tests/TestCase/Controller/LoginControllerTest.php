<?php
namespace App\Test\TestCase\Controller;

use App\Controller\LoginController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\GamesController Test Case
 */
class LoginControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [

    ];

    /**
     * Test index method
     *
     * @return void
     */

    public function testIndex()
    {
      $this->get('/login');

      $this->assertResponseOk();
    }
}
