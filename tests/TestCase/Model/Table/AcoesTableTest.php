<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AcoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AcoesTable Test Case
 */
class AcoesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AcoesTable
     */
    public $Acoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.acoes',
        'app.usuarios',
        'app.colaboradores',
        'app.consultores',
        'app.instituicoes_implementadoras',
        'app.instituicoes',
        'app.instituicoes_organizadoras',
        'app.empresas',
        'app.unidades_organizacionais',
        'app.grupos_empresas',
        'app.instituicoes_avaliadoras',
        'app.treinamentos',
        'app.treinamentos_participantes',
        'app.reunioes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Acoes') ? [] : ['className' => 'App\Model\Table\AcoesTable'];
        $this->Acoes = TableRegistry::get('Acoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Acoes);

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
