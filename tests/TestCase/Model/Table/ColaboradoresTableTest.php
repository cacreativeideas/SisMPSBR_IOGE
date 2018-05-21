<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ColaboradoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ColaboradoresTable Test Case
 */
class ColaboradoresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ColaboradoresTable
     */
    public $Colaboradores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.colaboradores',
        'app.unidades_organizacionais',
        'app.usuarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Colaboradores') ? [] : ['className' => 'App\Model\Table\ColaboradoresTable'];
        $this->Colaboradores = TableRegistry::get('Colaboradores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Colaboradores);

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
