<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReunioesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReunioesTable Test Case
 */
class ReunioesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReunioesTable
     */
    public $Reunioes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reunioes',
        'app.instituicoes_implementadoras',
        'app.instituicoes',
        'app.instituicoes_avaliadoras',
        'app.instituicoes_organizadoras',
        'app.consultores',
        'app.usuarios',
        'app.acoes',
        'app.colaboradores',
        'app.treinamentos',
        'app.grupos_empresas',
        'app.treinamentos_participantes',
        'app.unidades_organizacionais',
        'app.empresas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Reunioes') ? [] : ['className' => 'App\Model\Table\ReunioesTable'];
        $this->Reunioes = TableRegistry::get('Reunioes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Reunioes);

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
