<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GamesSamplesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GamesSamplesTable Test Case
 */
class GamesSamplesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GamesSamplesTable
     */
    public $GamesSamples;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.games_samples',
        'app.samples',
        'app.games',
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
        $config = TableRegistry::exists('GamesSamples') ? [] : ['className' => 'App\Model\Table\GamesSamplesTable'];
        $this->GamesSamples = TableRegistry::get('GamesSamples', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GamesSamples);

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
