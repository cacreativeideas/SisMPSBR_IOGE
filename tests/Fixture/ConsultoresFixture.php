<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConsultoresFixture
 *
 */
class ConsultoresFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'consultores';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'is_coordenador' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'usuario_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'instituicao_implementadora_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'modelo_referencia' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'ativo' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'usuario_key_idx' => ['type' => 'index', 'columns' => ['usuario_id'], 'length' => []],
            'consultor_instituicaoimplementadora_key_idx' => ['type' => 'index', 'columns' => ['instituicao_implementadora_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'consultor_instituicaoimplementadora_key' => ['type' => 'foreign', 'columns' => ['instituicao_implementadora_id'], 'references' => ['instituicoes_implementadoras', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'consultor_usuario_key' => ['type' => 'foreign', 'columns' => ['usuario_id'], 'references' => ['usuarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'is_coordenador' => 1,
            'usuario_id' => 1,
            'instituicao_implementadora_id' => 1,
            'modelo_referencia' => 'Lorem ipsum dolor ',
            'ativo' => 1
        ],
    ];
}
