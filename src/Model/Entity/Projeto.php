<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Projeto Entity.
 *
 * @property int $id
 * @property \Cake\I18n\Time $data_prevista_marco_100
 * @property \Cake\I18n\Time $data_prevista_marco_50
 * @property \Cake\I18n\Time $data_prevista_avaliacao
 * @property \Cake\I18n\Time $data_assinatura_convenio
 * @property \Cake\I18n\Time $data_inicio_implementacao
 * @property string $parecer_ii_cumprimento
 * @property string $parecer_ii_comprometimento
 * @property string $parecer_ii_dificuldades
 * @property string $parecer_ioge_desempenho
 * @property string $parecer_ioge_dificuldades
 * @property string $parecer_ioge_observacoes
 * @property \Cake\I18n\Time $data_realizacao_marco_50
 * @property \Cake\I18n\Time $data_realizacao_marco_100
 * @property \Cake\I18n\Time $data_realizacao_avaliacao
 * @property int $grupo_empresas_id
 * @property \App\Model\Entity\GruposEmpresa $grupos_empresa
 * @property int $unidade_organizacional_id
 * @property \App\Model\Entity\UnidadesOrganizacional $unidades_organizacional
 * @property string $descricao_processo_ii
 * @property int $instituicao_implementadora_id
 * @property \App\Model\Entity\InstituicoesImplementadora $instituicoes_implementadora
 * @property string $descricao_processo_ia
 * @property int $instituicao_avaliadora_id
 * @property \App\Model\Entity\InstituicoesAvaliadora $instituicoes_avaliadora
 * @property int $ativo
 * @property \App\Model\Entity\Atividade[] $atividades
 * @property \App\Model\Entity\LicoesAprendida[] $licoes_aprendidas
 * @property \App\Model\Entity\Pagamento[] $pagamentos
 * @property \App\Model\Entity\Problema[] $problemas
 * @property \App\Model\Entity\Risco[] $riscos
 */
class Projeto extends Entity
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
