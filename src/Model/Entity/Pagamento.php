<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pagamento Entity.
 *
 * @property int $id
 * @property float $valor_implementacao
 * @property float $valor_avaliacao
 * @property float $valor_total
 * @property float $valor_softex
 * @property float $valor_restante
 * @property float $valor_pago_implementacao
 * @property float $valor_pago_avaliacao
 * @property float $valor_gasto_total
 * @property string $justificativa_recursos_terceiros
 * @property int $projeto_id
 * @property \App\Model\Entity\Projeto $projeto
 * @property int $ativo
 * @property \App\Model\Entity\Parcela[] $parcelas
 * @property \App\Model\Entity\Restituicao[] $restituicoes
 */
class Pagamento extends Entity
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
