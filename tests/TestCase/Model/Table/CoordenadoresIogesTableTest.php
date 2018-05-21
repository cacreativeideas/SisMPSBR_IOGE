<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CoordenadoresIogesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CoordenadoresIogesTable Test Case
 */
class CoordenadoresIogesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CoordenadoresIogesTable
     */
    public $CoordenadoresIoges;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.coordenadores_ioges',
        'app.instituicoes_organizadoras',
        'app.instituicoes',
        'app.instituicoes_implementadoras',
        'app.empresas',
        'app.unidades_organizacionais',
        'app.grupos_empresas',
        'app.instituicoes_avaliadoras',
        'app.usuarios',
        'app.acoes',
        'app.reunioes',
        'app.consultores',
        'app.treinamentos',
        'app.treinamentos_participantes',
        'app.colaboradores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CoordenadoresIoges') ? [] : ['className' => 'App\Model\Table\CoordenadoresIogesTable'];
        $this->CoordenadoresIoges = TableRegistry::get('CoordenadoresIoges', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CoordenadoresIoges);

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
