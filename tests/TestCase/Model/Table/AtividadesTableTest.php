<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AtividadesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AtividadesTable Test Case
 */
class AtividadesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AtividadesTable
     */
    public $Atividades;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.atividades',
        'app.projetos',
        'app.grupos_empresas',
        'app.instituicoes_organizadoras',
        'app.instituicoes',
        'app.instituicoes_implementadoras',
        'app.empresas',
        'app.unidades_organizacionais',
        'app.instituicoes_avaliadoras',
        'app.licoes_aprendidas',
        'app.pagamentos',
        'app.parcelas',
        'app.restituicoes',
        'app.problemas',
        'app.riscos',
        'app.consultores',
        'app.usuarios',
        'app.acoes',
        'app.reunioes',
        'app.colaboradores',
        'app.treinamentos',
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
        $config = TableRegistry::exists('Atividades') ? [] : ['className' => 'App\Model\Table\AtividadesTable'];
        $this->Atividades = TableRegistry::get('Atividades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Atividades);

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
