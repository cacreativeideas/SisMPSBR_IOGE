<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjetosUo Entity.
 *
 * @property int $id
 * @property string $descricao
 * @property string $status
 * @property int $unidade_organizacional_id
 * @property \App\Model\Entity\UnidadesOrganizacional $unidades_organizacional
 * @property int $ativo
 */
class ProjetosUo extends Entity
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
