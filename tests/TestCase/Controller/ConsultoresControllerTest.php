<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ConsultoresController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ConsultoresController Test Case
 */
class ConsultoresControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.consultores',
        'app.usuarios',
        'app.acoes',
        'app.reunioes',
        'app.instituicoes_implementadoras',
        'app.instituicoes',
        'app.instituicoes_organizadoras',
        'app.empresas',
        'app.unidades_organizacionais',
        'app.grupos_empresas',
        'app.instituicoes_avaliadoras',
        'app.colaboradores',
        'app.treinamentos',
        'app.treinamentos_participantes'
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
