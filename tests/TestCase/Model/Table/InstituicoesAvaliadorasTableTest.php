<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InstituicoesAvaliadorasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InstituicoesAvaliadorasTable Test Case
 */
class InstituicoesAvaliadorasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InstituicoesAvaliadorasTable
     */
    public $InstituicoesAvaliadoras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.instituicoes_avaliadoras',
        'app.instituicoes',
        'app.instituicoes_implementadoras',
        'app.instituicoes_organizadoras',
        'app.empresas',
        'app.unidades_organizacionais',
        'app.grupos_empresas',
        'app.projetos',
        'app.atividades',
        'app.consultores',
        'app.usuarios',
        'app.acoes',
        'app.reunioes',
        'app.coordenadores_ioges',
        'app.treinamentos',
        'app.treinamentos_participantes',
        'app.licoes_aprendidas',
        'app.pagamentos',
        'app.parcelas',
        'app.restituicoes',
        'app.problemas',
        'app.riscos',
        'app.instituicoes_avaliadoras_projetos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InstituicoesAvaliadoras') ? [] : ['className' => 'App\Model\Table\InstituicoesAvaliadorasTable'];
        $this->InstituicoesAvaliadoras = TableRegistry::get('InstituicoesAvaliadoras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InstituicoesAvaliadoras);

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
