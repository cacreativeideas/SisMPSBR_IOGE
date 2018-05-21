<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Empresa Entity.
 *
 * @property int $id
 * @property string $razao_social
 * @property string $cnpj
 * @property string $nome
 * @property string $endereco
 * @property string $descricao_atividades
 * @property string $porte
 * @property string $logo
 * @property string $website
 * @property int $instituicao_organizadora_id
 * @property \App\Model\Entity\InstituicoesOrganizadora $instituicoes_organizadora
 * @property int $ativo
 * @property \App\Model\Entity\UnidadesOrganizacional[] $unidades_organizacionais
 */
class Empresa extends Entity
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
