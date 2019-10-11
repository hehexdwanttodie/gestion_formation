<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CivilitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CivilitiesTable Test Case
 */
class CivilitiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CivilitiesTable
     */
    public $Civilities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Civilities',
        'app.Employes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Civilities') ? [] : ['className' => CivilitiesTable::class];
        $this->Civilities = TableRegistry::getTableLocator()->get('Civilities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Civilities);

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
}
