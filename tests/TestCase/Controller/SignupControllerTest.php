<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SignupController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\GamesController Test Case
 */
class SignupControllerTest extends IntegrationTestCase
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
      $this->get('/signup');

      $this->assertResponseOk();
    }
}
