<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LicoesAprendidasFixture
 *
 */
class LicoesAprendidasFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'licoes_aprendidas';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'licao_aprendida' => ['type' => 'string', 'length' => 250, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'ocorrencia' => ['type' => 'string', 'length' => 250, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'momento_projeto' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'impacto' => ['type' => 'string', 'length' => 5, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'influencia' => ['type' => 'string', 'length' => 8, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'data_identificacao' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'data_cadastro' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'projeto_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ativo' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'topico_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'licaoaprendida_projeto_idx' => ['type' => 'index', 'columns' => ['projeto_id'], 'length' => []],
            'licaoaprendida_topico_idx' => ['type' => 'index', 'columns' => ['topico_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'licaoaprendida_projeto' => ['type' => 'foreign', 'columns' => ['projeto_id'], 'references' => ['projetos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'licaoaprendida_topico' => ['type' => 'foreign', 'columns' => ['topico_id'], 'references' => ['topicos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'licao_aprendida' => 'Lorem ipsum dolor sit amet',
            'ocorrencia' => 'Lorem ipsum dolor sit amet',
            'momento_projeto' => 'Lorem ipsum dolor sit amet',
            'impacto' => 'Lor',
            'influencia' => 'Lorem ',
            'data_identificacao' => 'Lorem ip',
            'data_cadastro' => '2016-07-05',
            'projeto_id' => 1,
            'ativo' => 1,
            'topico_id' => 1
        ],
    ];
}
