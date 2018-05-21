<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GruposEmpresa Entity.
 *
 * @property int $id
 * @property string $nome
 * @property string $edital_associado
 * @property string $descricao_processo_ii
 * @property string $descricao_processo_ia
 * @property string $descricao_penalidades
 * @property string $descricao_obrigatoriedades
 * @property int $instituicao_organizadora_id
 * @property \App\Model\Entity\InstituicoesOrganizadora $instituicoes_organizadora
 * @property int $ativo
 * @property \App\Model\Entity\InstituicoesAvaliadora $instituicoes_avaliadora
 * @property \App\Model\Entity\InstituicoesImplementadora $instituicoes_implementadora
 * @property \App\Model\Entity\UnidadesOrganizacional[] $unidades_organizacionais
 */
class GruposEmpresa extends Entity
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
        'id' => false
    ];
}
