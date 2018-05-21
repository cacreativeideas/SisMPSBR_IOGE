<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LicoesAprendidasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LicoesAprendidasTable Test Case
 */
class LicoesAprendidasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LicoesAprendidasTable
     */
    public $LicoesAprendidas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.licoes_aprendidas',
        'app.projetos',
        'app.grupos_empresas',
        'app.instituicoes_organizadoras',
        'app.instituicoes',
        'app.instituicoes_avaliadoras',
        'app.instituicoes_implementadoras',
        'app.empresas',
        'app.unidades_organizacionais',
        'app.consultores',
        'app.usuarios',
        'app.coordenadores_ioges',
        'app.consultores_projetos',
        'app.treinamentos',
        'app.treinamentos_participantes',
        'app.atividades',
        'app.pagamentos',
        'app.parcelas',
        'app.restituicoes',
        'app.problemas',
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
        $config = TableRegistry::exists('LicoesAprendidas') ? [] : ['className' => 'App\Model\Table\LicoesAprendidasTable'];
        $this->LicoesAprendidas = TableRegistry::get('LicoesAprendidas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LicoesAprendidas);

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
