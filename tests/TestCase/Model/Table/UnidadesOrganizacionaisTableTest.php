<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UnidadesOrganizacionaisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UnidadesOrganizacionaisTable Test Case
 */
class UnidadesOrganizacionaisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UnidadesOrganizacionaisTable
     */
    public $UnidadesOrganizacionais;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.unidades_organizacionais',
        'app.empresas',
        'app.instituicoes_organizadoras',
        'app.instituicoes',
        'app.instituicoes_avaliadoras',
        'app.instituicoes_implementadoras',
        'app.grupos_empresas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UnidadesOrganizacionais') ? [] : ['className' => 'App\Model\Table\UnidadesOrganizacionaisTable'];
        $this->UnidadesOrganizacionais = TableRegistry::get('UnidadesOrganizacionais', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UnidadesOrganizacionais);

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
