<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ParcelasFixture
 *
 */
class ParcelasFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'parcelas';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'pagamento_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'data_pagamento' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'valor_parcela' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'data_prevista_pagamento' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'momento_pagamento' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'comment' => 'referente ao cronograma de desembolso da softex', 'precision' => null, 'fixed' => null],
        'ativo' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'parcela_pagamento_key_idx' => ['type' => 'index', 'columns' => ['pagamento_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'parcela_pagamento_key' => ['type' => 'foreign', 'columns' => ['pagamento_id'], 'references' => ['pagamentos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'data_pagamento' => '2016-05-06',
            'valor_parcela' => 1,
            'data_prevista_pagamento' => '2016-05-06',
            'momento_pagamento' => 'Lorem ipsum dolor sit amet',
            'ativo' => 1
        ],
    ];
}
