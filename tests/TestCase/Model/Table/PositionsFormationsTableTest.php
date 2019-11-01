<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PositionsFormationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PositionsFormationsTable Test Case
 */
class PositionsFormationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PositionsFormationsTable
     */
    public $PositionsFormations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PositionsFormations',
        'app.Positions',
        'app.Formations',
        'app.Status'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PositionsFormations') ? [] : ['className' => PositionsFormationsTable::class];
        $this->PositionsFormations = TableRegistry::getTableLocator()->get('PositionsFormations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PositionsFormations);

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
