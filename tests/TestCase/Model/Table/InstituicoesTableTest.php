<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InstituicoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InstituicoesTable Test Case
 */
class InstituicoesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InstituicoesTable
     */
    public $Instituicoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.instituicoes',
        'app.instituicoes_implementadoras',
        'app.instituicoes_organizadoras',
        'app.empresas',
        'app.unidades_organizacionais',
        'app.grupos_empresas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Instituicoes') ? [] : ['className' => 'App\Model\Table\InstituicoesTable'];
        $this->Instituicoes = TableRegistry::get('Instituicoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Instituicoes);

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
