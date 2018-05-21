<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Parcela Entity.
 *
 * @property int $id
 * @property int $pagamento_id
 * @property \App\Model\Entity\Pagamento $pagamento
 * @property \Cake\I18n\Time $data_pagamento
 * @property float $valor_parcela
 * @property \Cake\I18n\Time $data_prevista_pagamento
 * @property string $momento_pagamento
 * @property int $ativo
 */
class Parcela extends Entity
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
