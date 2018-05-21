<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RestituicoesFixture
 *
 */
class RestituicoesFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'restituicoes';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'pagamento_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'unidade_organizacional_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'data_pagamento' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'valor_restituicao' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'data_notificacao' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'ativo' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'restituicao_pagamento_key_idx' => ['type' => 'index', 'columns' => ['pagamento_id'], 'length' => []],
            'restituicao_unidadeorganizacional_key_idx' => ['type' => 'index', 'columns' => ['unidade_organizacional_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'restituicao_pagamento_key' => ['type' => 'foreign', 'columns' => ['pagamento_id'], 'references' => ['pagamentos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'restituicao_unidadeorganizacional_key' => ['type' => 'foreign', 'columns' => ['unidade_organizacional_id'], 'references' => ['unidades_organizacionais', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'pagamento_id' => 1,
            'unidade_organizacional_id' => 1,
            'data_pagamento' => '2016-05-06',
            'valor_restituicao' => 1,
            'data_notificacao' => '2016-05-06',
            'ativo' => 1
        ],
    ];
}
