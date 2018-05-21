<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TopicosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TopicosTable Test Case
 */
class TopicosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TopicosTable
     */
    public $Topicos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.topicos',
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
        $config = TableRegistry::exists('Topicos') ? [] : ['className' => 'App\Model\Table\TopicosTable'];
        $this->Topicos = TableRegistry::get('Topicos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Topicos);

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
}
