<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AccountController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\GamesController Test Case
 */
class AccountControllerTest extends IntegrationTestCase
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
      $this->get('/account');

      $this->assertResponseOk();
    }
}
