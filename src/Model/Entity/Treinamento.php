<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Treinamento Entity.
 *
 * @property int $id
 * @property \Cake\I18n\Time $data_treinamento
 * @property string $local
 * @property string $endereco
 * @property string $cidade
 * @property string $estado
 * @property string $nome
 * @property string $descricao
 * @property \Cake\I18n\Time $horario_inicio
 * @property \Cake\I18n\Time $horario_fim
 * @property int $usuario_id
 * @property \App\Model\Entity\Usuario $usuario
 * @property int $consultor_id
 * @property \App\Model\Entity\Consultor $consultor
 * @property int $grupo_empresas_id
 * @property \App\Model\Entity\GruposEmpresa $grupos_empresa
 * @property int $ativo
 * @property \App\Model\Entity\TreinamentosParticipante[] $treinamentos_participantes
 */
class Treinamento extends Entity
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
