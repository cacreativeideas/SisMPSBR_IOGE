<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjetosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjetosTable Test Case
 */
class ProjetosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjetosTable
     */
    public $Projetos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.projetos',
        'app.grupos_empresas',
        'app.instituicoes_organizadoras',
        'app.instituicoes',
        'app.instituicoes_avaliadoras',
        'app.instituicoes_implementadoras',
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
        $config = TableRegistry::exists('Projetos') ? [] : ['className' => 'App\Model\Table\ProjetosTable'];
        $this->Projetos = TableRegistry::get('Projetos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Projetos);

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
