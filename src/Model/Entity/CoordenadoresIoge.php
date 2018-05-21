<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * CoordenadoresIoge Entity.
 *
 * @property int $id
 * @property int $instituicao_organizadora_id
 * @property \App\Model\Entity\InstituicoesOrganizadora $instituicoes_organizadora
 * @property int $usuario_id
 * @property \App\Model\Entity\Usuario $usuario
 * @property int $ativo
 */
class CoordenadoresIoge extends Entity
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
