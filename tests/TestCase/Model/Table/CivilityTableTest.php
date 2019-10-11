<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CivilityTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CivilityTable Test Case
 */
class CivilityTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CivilityTable
     */
    public $Civility;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Civility',
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
        $config = TableRegistry::getTableLocator()->exists('Civility') ? [] : ['className' => CivilityTable::class];
        $this->Civility = TableRegistry::getTableLocator()->get('Civility', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Civility);

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
