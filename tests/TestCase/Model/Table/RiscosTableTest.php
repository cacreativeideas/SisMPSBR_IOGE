<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RiscosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RiscosTable Test Case
 */
class RiscosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RiscosTable
     */
    public $Riscos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.riscos',
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
        'app.licoes_aprendidas',
        'app.topicos',
        'app.pagamentos',
        'app.parcelas',
        'app.restituicoes',
        'app.problemas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Riscos') ? [] : ['className' => 'App\Model\Table\RiscosTable'];
        $this->Riscos = TableRegistry::get('Riscos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Riscos);

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
