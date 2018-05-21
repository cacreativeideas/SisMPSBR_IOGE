<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConsultoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConsultoresTable Test Case
 */
class ConsultoresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConsultoresTable
     */
    public $Consultores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.consultores',
        'app.usuarios',
        'app.coordenadores_ioges',
        'app.instituicoes_organizadoras',
        'app.instituicoes',
        'app.instituicoes_avaliadoras',
        'app.projetos',
        'app.grupos_empresas',
        'app.unidades_organizacionais',
        'app.empresas',
        'app.instituicoes_implementadoras',
        'app.consultores_projetos',
        'app.atividades',
        'app.licoes_aprendidas',
        'app.topicos',
        'app.pagamentos',
        'app.parcelas',
        'app.restituicoes',
        'app.problemas',
        'app.riscos',
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
        $config = TableRegistry::exists('Consultores') ? [] : ['className' => 'App\Model\Table\ConsultoresTable'];
        $this->Consultores = TableRegistry::get('Consultores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Consultores);

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
