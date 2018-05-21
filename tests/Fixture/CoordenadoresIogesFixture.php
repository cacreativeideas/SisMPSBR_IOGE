<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CoordenadoresIogesFixture
 *
 */
class CoordenadoresIogesFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'coordenadores_ioges';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'instituicao_organizadora_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'usuario_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ativo' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'coordenadorioge_instituicaoimplementadora_key_idx' => ['type' => 'index', 'columns' => ['instituicao_organizadora_id'], 'length' => []],
            'coordenadorioge_usuario_key_idx' => ['type' => 'index', 'columns' => ['usuario_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'coordenadorioge_instituicaoimplementadora_key' => ['type' => 'foreign', 'columns' => ['instituicao_organizadora_id'], 'references' => ['instituicoes_organizadoras', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'coordenadorioge_usuario_key' => ['type' => 'foreign', 'columns' => ['usuario_id'], 'references' => ['usuarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'instituicao_organizadora_id' => 1,
            'usuario_id' => 1,
            'ativo' => 1
        ],
    ];
}
