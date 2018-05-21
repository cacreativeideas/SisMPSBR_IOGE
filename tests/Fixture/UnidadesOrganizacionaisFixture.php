<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UnidadesOrganizacionaisFixture
 *
 */
class UnidadesOrganizacionaisFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'unidades_organizacionais';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'nome' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'descricao_atividades' => ['type' => 'string', 'length' => 250, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'nivel_mps' => ['type' => 'string', 'fixed' => true, 'length' => 8, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'empresa_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'grupo_empresas_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'versao_modelo' => ['type' => 'string', 'length' => 15, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'modelo_referencia' => ['type' => 'string', 'fixed' => true, 'length' => 6, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'descricao_processo_uo' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'ativo' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'unidadeorganizacional_empresa_key_idx' => ['type' => 'index', 'columns' => ['empresa_id'], 'length' => []],
            'unidadeorganizacional_grupo_empresas_key_idx' => ['type' => 'index', 'columns' => ['grupo_empresas_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'unidadeorganizacional_empresa_key' => ['type' => 'foreign', 'columns' => ['empresa_id'], 'references' => ['empresas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'unidadeorganizacional_grupo_empresas_key' => ['type' => 'foreign', 'columns' => ['grupo_empresas_id'], 'references' => ['grupos_empresas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'nome' => 'Lorem ipsum dolor sit amet',
            'descricao_atividades' => 'Lorem ipsum dolor sit amet',
            'nivel_mps' => 'Lorem ',
            'empresa_id' => 1,
            'grupo_empresas_id' => 1,
            'versao_modelo' => 'Lorem ipsum d',
            'modelo_referencia' => 'Lore',
            'descricao_processo_uo' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'ativo' => 1
        ],
    ];
}
