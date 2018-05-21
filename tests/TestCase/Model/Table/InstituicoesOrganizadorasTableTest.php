<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InstituicoesOrganizadorasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InstituicoesOrganizadorasTable Test Case
 */
class InstituicoesOrganizadorasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InstituicoesOrganizadorasTable
     */
    public $InstituicoesOrganizadoras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.instituicoes_organizadoras',
        'app.instituicoes',
        'app.instituicoes_avaliadoras',
        'app.instituicoes_implementadoras',
        'app.empresas',
        'app.unidades_organizacionais',
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
        $config = TableRegistry::exists('InstituicoesOrganizadoras') ? [] : ['className' => 'App\Model\Table\InstituicoesOrganizadorasTable'];
        $this->InstituicoesOrganizadoras = TableRegistry::get('InstituicoesOrganizadoras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InstituicoesOrganizadoras);

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
