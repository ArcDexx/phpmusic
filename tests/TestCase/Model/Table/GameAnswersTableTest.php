<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GameAnswersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GameAnswersTable Test Case
 */
class GameAnswersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GameAnswersTable
     */
    public $GameAnswers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.game_answers',
        'app.game_users',
        'app.samples',
        'app.games',
        'app.games_samples',
        'app.users',
        'app.games_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('GameAnswers') ? [] : ['className' => 'App\Model\Table\GameAnswersTable'];
        $this->GameAnswers = TableRegistry::get('GameAnswers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GameAnswers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
