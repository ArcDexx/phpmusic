<?php
namespace App\Test\TestCase\Controller;

use App\Controller\HomeController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\GamesController Test Case
 */
class HomeControllerTest extends IntegrationTestCase
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
      $this->get('/');

      $this->assertResponseOk();
    }
}
