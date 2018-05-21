<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Consultor Entity.
 *
 * @property int $id
 * @property int $is_coordenador
 * @property int $usuario_id
 * @property \App\Model\Entity\Usuario $usuario
 * @property int $instituicao_implementadora_id
 * @property \App\Model\Entity\InstituicoesImplementadora $instituicoes_implementadora
 * @property string $modelo_referencia
 * @property int $ativo
 * @property \App\Model\Entity\Projeto[] $projetos
 * @property \App\Model\Entity\Treinamento[] $treinamentos
 */
class Consultor extends Entity
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
