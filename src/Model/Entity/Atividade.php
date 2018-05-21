<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Atividade Entity.
 *
 * @property int $id
 * @property string $descricao
 * @property string $tipo_atividade
 * @property \Cake\I18n\Time $data_inicio_planejada
 * @property \Cake\I18n\Time $data_inicio_realizada
 * @property \Cake\I18n\Time $data_fim_planejada
 * @property \Cake\I18n\Time $data_fim_realizada
 * @property string $situacao
 * @property \Cake\I18n\Time $total_horas
 * @property int $projeto_id
 * @property \App\Model\Entity\Projeto $projeto
 * @property int $consultor_planejado_id
 * @property int $consultor_realizado_id
 * @property \App\Model\Entity\Consultor $consultor
 * @property \Cake\I18n\Time $data_cadastro
 * @property int $ativo
 */
class Atividade extends Entity
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
