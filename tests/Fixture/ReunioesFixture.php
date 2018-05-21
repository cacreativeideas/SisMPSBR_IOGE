<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReunioesFixture
 *
 */
class ReunioesFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'reunioes';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'data_realizacao' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'hora_inicio' => ['type' => 'time', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'hora_fim' => ['type' => 'time', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'local_reuniao' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'nome_redator' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'objetivo' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'discussao' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'instituicao_implementadora_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'consultor_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'unidade_organizacional_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ativo' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'reuniao_instituicaoimplementadora_key_idx' => ['type' => 'index', 'columns' => ['instituicao_implementadora_id'], 'length' => []],
            'reuniao_consultor_key_idx' => ['type' => 'index', 'columns' => ['consultor_id'], 'length' => []],
            'reuniao_unidadeorganizacional_key_idx' => ['type' => 'index', 'columns' => ['unidade_organizacional_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'reuniao_consultor_key' => ['type' => 'foreign', 'columns' => ['consultor_id'], 'references' => ['consultores', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'reuniao_instituicaoimplementadora_key' => ['type' => 'foreign', 'columns' => ['instituicao_implementadora_id'], 'references' => ['instituicoes_implementadoras', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'reuniao_unidadeorganizacional_key' => ['type' => 'foreign', 'columns' => ['unidade_organizacional_id'], 'references' => ['unidades_organizacionais', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'data_realizacao' => '2016-05-06',
            'hora_inicio' => '14:43:35',
            'hora_fim' => '14:43:35',
            'local_reuniao' => 'Lorem ipsum dolor sit amet',
            'nome_redator' => 'Lorem ipsum dolor sit amet',
            'objetivo' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'discussao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'instituicao_implementadora_id' => 1,
            'consultor_id' => 1,
            'unidade_organizacional_id' => 1,
            'ativo' => 1
        ],
    ];
}
