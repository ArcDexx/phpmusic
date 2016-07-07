<?php
namespace App\Test\TestCase\Controller;

use App\Controller\GamesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\GamesController Test Case
 */
class GamesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.games',
        'app.users',
    ];

    /**
     * Test index method
     *
     * @return void
     */

    public function testIndex()
    {
      $this->get('/games');

      $this->assertResponseOk();
    }

    public function testCheckinput()
    {
      $controller = new GamesController();

      $this->assertEquals(0, $controller->checkinput('random', '???'));
      $this->assertEquals(100, $controller->checkinput('random', 'random'));
    }
}
