<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UnidadesOrganizacional Entity.
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao_atividades
 * @property string $nivel_mps
 * @property int $empresa_id
 * @property \App\Model\Entity\Empresa $empresa
 * @property int $grupo_empresas_id
 * @property \App\Model\Entity\GruposEmpresa $grupos_empresa
 * @property string $versao_modelo
 * @property string $modelo_referencia
 * @property string $descricao_processo_uo
 * @property int $ativo
 */
class UnidadesOrganizacional extends Entity
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
