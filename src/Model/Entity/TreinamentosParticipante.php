<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TreinamentosParticipante Entity.
 *
 * @property int $id
 * @property int $treinamento_id
 * @property \App\Model\Entity\Treinamento $treinamento
 * @property string $nome_participante
 * @property int $empresa_id
 * @property int $ativo
 */
class TreinamentosParticipante extends Entity
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
