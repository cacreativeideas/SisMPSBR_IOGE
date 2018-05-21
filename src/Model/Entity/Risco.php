<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Risco Entity.
 *
 * @property int $id
 * @property string $descricao
 * @property string $acao_prevencao
 * @property string $acao_contingencia
 * @property string $data_acompanhamento
 * @property string $situacao
 * @property string $impacto
 * @property string $probabilidade
 * @property string $severidade
 * @property int $projeto_id
 * @property \App\Model\Entity\Projeto $projeto
 * @property int $ativo
 * @property int $consultor_id
 */
class Risco extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
