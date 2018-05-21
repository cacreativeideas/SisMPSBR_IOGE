<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TreinamentosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TreinamentosTable Test Case
 */
class TreinamentosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TreinamentosTable
     */
    public $Treinamentos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.treinamentos',
        'app.usuarios',
        'app.acoes',
        'app.reunioes',
        'app.instituicoes_implementadoras',
        'app.instituicoes',
        'app.instituicoes_avaliadoras',
        'app.instituicoes_organizadoras',
        'app.consultores',
        'app.unidades_organizacionais',
        'app.empresas',
        'app.grupos_empresas',
        'app.colaboradores',
        'app.treinamentos_participantes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Treinamentos') ? [] : ['className' => 'App\Model\Table\TreinamentosTable'];
        $this->Treinamentos = TableRegistry::get('Treinamentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Treinamentos);

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
