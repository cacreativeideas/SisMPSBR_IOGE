<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjetosUosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjetosUosTable Test Case
 */
class ProjetosUosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjetosUosTable
     */
    public $ProjetosUos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.projetos_uos',
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
        $config = TableRegistry::exists('ProjetosUos') ? [] : ['className' => 'App\Model\Table\ProjetosUosTable'];
        $this->ProjetosUos = TableRegistry::get('ProjetosUos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjetosUos);

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
