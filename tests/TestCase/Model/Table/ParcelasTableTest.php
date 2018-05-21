<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ParcelasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ParcelasTable Test Case
 */
class ParcelasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ParcelasTable
     */
    public $Parcelas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.parcelas',
        'app.pagamentos',
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
        'app.problemas',
        'app.riscos',
        'app.restituicoes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Parcelas') ? [] : ['className' => 'App\Model\Table\ParcelasTable'];
        $this->Parcelas = TableRegistry::get('Parcelas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Parcelas);

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
