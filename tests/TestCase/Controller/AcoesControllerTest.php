<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AcoesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AcoesController Test Case
 */
class AcoesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.acoes',
        'app.usuarios',
        'app.colaboradores',
        'app.consultores',
        'app.instituicoes_implementadoras',
        'app.instituicoes',
        'app.instituicoes_organizadoras',
        'app.empresas',
        'app.unidades_organizacionais',
        'app.grupos_empresas',
        'app.instituicoes_avaliadoras',
        'app.treinamentos',
        'app.treinamentos_participantes',
        'app.reunioes'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
