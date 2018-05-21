<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InstituicoesImplementadorasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InstituicoesImplementadorasTable Test Case
 */
class InstituicoesImplementadorasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InstituicoesImplementadorasTable
     */
    public $InstituicoesImplementadoras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.instituicoes_implementadoras',
        'app.instituicoes',
        'app.instituicoes_avaliadoras',
        'app.projetos',
        'app.grupos_empresas',
        'app.instituicoes_organizadoras',
        'app.empresas',
        'app.unidades_organizacionais',
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
        'app.instituicoes_avaliadoras_projetos',
        'app.instituicoes_implementadoras_projetos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InstituicoesImplementadoras') ? [] : ['className' => 'App\Model\Table\InstituicoesImplementadorasTable'];
        $this->InstituicoesImplementadoras = TableRegistry::get('InstituicoesImplementadoras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InstituicoesImplementadoras);

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
