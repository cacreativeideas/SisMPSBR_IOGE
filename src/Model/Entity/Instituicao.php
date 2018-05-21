<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Instituicao Entity.
 *
 * @property int $id
 * @property string $razao_social
 * @property string $cnpj
 * @property string $nome
 * @property string $endereco
 * @property string $telefone
 * @property string $website
 * @property string $logo
 * @property \App\Model\Entity\InstituicoesImplementadora $instituicoes_implementadora
 * @property \App\Model\Entity\InstituicoesOrganizadora $instituicoes_organizadora
 */
class Instituicao extends Entity
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
