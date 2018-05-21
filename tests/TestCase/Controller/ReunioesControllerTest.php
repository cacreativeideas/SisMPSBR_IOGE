<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ReunioesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ReunioesController Test Case
 */
class ReunioesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reunioes',
        'app.instituicoes_implementadoras',
        'app.instituicoes',
        'app.instituicoes_avaliadoras',
        'app.instituicoes_organizadoras',
        'app.consultores',
        'app.usuarios',
        'app.acoes',
        'app.colaboradores',
        'app.treinamentos',
        'app.grupos_empresas',
        'app.treinamentos_participantes',
        'app.unidades_organizacionais',
        'app.empresas'
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
