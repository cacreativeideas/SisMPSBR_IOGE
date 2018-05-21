<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Restituicao Entity.
 *
 * @property int $id
 * @property int $pagamento_id
 * @property \App\Model\Entity\Pagamento $pagamento
 * @property int $unidade_organizacional_id
 * @property \App\Model\Entity\UnidadesOrganizacional $unidades_organizacional
 * @property \Cake\I18n\Time $data_pagamento
 * @property float $valor_restituicao
 * @property \Cake\I18n\Time $data_notificacao
 * @property int $ativo
 */
class Restituicao extends Entity
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
