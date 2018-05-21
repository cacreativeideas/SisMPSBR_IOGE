<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TreinamentosParticipantesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TreinamentosParticipantesTable Test Case
 */
class TreinamentosParticipantesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TreinamentosParticipantesTable
     */
    public $TreinamentosParticipantes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.treinamentos_participantes',
        'app.treinamentos',
        'app.grupos_empresas',
        'app.instituicoes_organizadoras',
        'app.instituicoes',
        'app.instituicoes_avaliadoras',
        'app.projetos',
        'app.unidades_organizacionais',
        'app.empresas',
        'app.instituicoes_implementadoras',
        'app.consultores',
        'app.usuarios',
        'app.coordenadores_ioges',
        'app.consultores_projetos',
        'app.atividades',
        'app.licoes_aprendidas',
        'app.topicos',
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
        $config = TableRegistry::exists('TreinamentosParticipantes') ? [] : ['className' => 'App\Model\Table\TreinamentosParticipantesTable'];
        $this->TreinamentosParticipantes = TableRegistry::get('TreinamentosParticipantes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TreinamentosParticipantes);

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
