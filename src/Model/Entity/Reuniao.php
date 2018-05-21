<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reuniao Entity.
 *
 * @property int $id
 * @property \Cake\I18n\Time $data_realizacao
 * @property \Cake\I18n\Time $hora_inicio
 * @property \Cake\I18n\Time $hora_fim
 * @property string $local_reuniao
 * @property string $nome_redator
 * @property string $objetivo
 * @property string $discussao
 * @property int $instituicao_implementadora_id
 * @property \App\Model\Entity\InstituicoesImplementadora $instituicoes_implementadora
 * @property int $consultor_id
 * @property \App\Model\Entity\Consultor $consultor
 * @property int $unidade_organizacional_id
 * @property \App\Model\Entity\UnidadesOrganizacional $unidades_organizacional
 * @property int $ativo
 * @property \App\Model\Entity\Acao[] $acoes
 */
class Reuniao extends Entity
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
