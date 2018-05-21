<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TreinamentosParticipantesFixture
 *
 */
class TreinamentosParticipantesFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'treinamentos_participantes';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'treinamento_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'nome_participante' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'empresa_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ativo' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'treinamentoparticipantes_treinamento_key_idx' => ['type' => 'index', 'columns' => ['treinamento_id'], 'length' => []],
            'treinamentoparticipantes_empresa_key_idx' => ['type' => 'index', 'columns' => ['empresa_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'treinamentoparticipantes_empresa_key' => ['type' => 'foreign', 'columns' => ['empresa_id'], 'references' => ['empresas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'treinamentoparticipantes_treinamento_key' => ['type' => 'foreign', 'columns' => ['treinamento_id'], 'references' => ['treinamentos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'treinamento_id' => 1,
            'nome_participante' => 'Lorem ipsum dolor sit amet',
            'empresa_id' => 1,
            'ativo' => 1
        ],
    ];
}
