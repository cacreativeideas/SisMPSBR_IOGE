<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProblemasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProblemasTable Test Case
 */
class ProblemasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProblemasTable
     */
    public $Problemas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.problemas',
        'app.projetos',
        'app.grupos_empresas',
        'app.instituicoes_organizadoras',
        'app.instituicoes',
        'app.instituicoes_avaliadoras',
        'app.instituicoes_implementadoras',
        'app.unidades_organizacionais',
        'app.empresas',
        'app.atividades',
        'app.consultores',
        'app.usuarios',
        'app.acoes',
        'app.reunioes',
        'app.colaboradores',
        'app.treinamentos',
        'app.treinamentos_participantes',
        'app.licoes_aprendidas',
        'app.pagamentos',
        'app.parcelas',
        'app.restituicoes',
        'app.riscos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Problemas') ? [] : ['className' => 'App\Model\Table\ProblemasTable'];
        $this->Problemas = TableRegistry::get('Problemas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Problemas);

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
