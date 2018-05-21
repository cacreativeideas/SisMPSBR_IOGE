<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InstituicoesOrganizadora Entity.
 *
 * @property int $id
 * @property int $instituicao_id
 * @property \App\Model\Entity\Instituicao $instituicao
 * @property int $ativo
 * @property \App\Model\Entity\Empresa[] $empresas
 */
class InstituicoesOrganizadora extends Entity
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
