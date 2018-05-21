<?php
namespace App\Model\Table;

use App\Model\Entity\Projeto;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projetos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $GruposEmpresas
 * @property \Cake\ORM\Association\BelongsTo $UnidadesOrganizacionais
 * @property \Cake\ORM\Association\BelongsTo $InstituicoesImplementadoras
 * @property \Cake\ORM\Association\BelongsTo $InstituicoesAvaliadoras
 * @property \Cake\ORM\Association\BelongsToMany $Consultores
 * @property \Cake\ORM\Association\HasMany $Atividades
 * @property \Cake\ORM\Association\HasMany $LicoesAprendidas
 * @property \Cake\ORM\Association\HasMany $Pagamentos
 * @property \Cake\ORM\Association\HasMany $Problemas
 * @property \Cake\ORM\Association\HasMany $Riscos
 */
class ProjetosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('projetos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('GruposEmpresas', [
            'foreignKey' => 'grupo_empresas_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('UnidadesOrganizacionais', [
            'foreignKey' => 'unidade_organizacional_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('InstituicoesImplementadoras', [
            'foreignKey' => 'instituicao_implementadora_id'
        ]);
        $this->belongsTo('InstituicoesAvaliadoras', [
            'foreignKey' => 'instituicao_avaliadora_id'
        ]);
        $this->belongsToMany('Consultores',[
            'through' => 'ConsultoresProjetos'
        ]);
        $this->hasMany('Atividades', [
            'foreignKey' => 'projeto_id'
        ]);
        $this->hasMany('LicoesAprendidas', [
            'foreignKey' => 'projeto_id'
        ]);
        $this->hasMany('Pagamentos', [
            'foreignKey' => 'projeto_id'
        ]);
        $this->hasMany('Problemas', [
            'foreignKey' => 'projeto_id'
        ]);
        $this->hasMany('Riscos', [
            'foreignKey' => 'projeto_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->date('data_prevista_marco_100')
            ->allowEmpty('data_prevista_marco_100');

        $validator
            ->date('data_prevista_marco_50')
            ->allowEmpty('data_prevista_marco_50');

        $validator
            ->date('data_prevista_avaliacao')
            ->allowEmpty('data_prevista_avaliacao');

        $validator
            ->date('data_assinatura_convenio')
            ->allowEmpty('data_assinatura_convenio');

        $validator
            ->date('data_inicio_implementacao')
            ->allowEmpty('data_inicio_implementacao');

        $validator
            ->allowEmpty('parecer_ii_cumprimento');

        $validator
            ->allowEmpty('parecer_ii_comprometimento');

        $validator
            ->allowEmpty('parecer_ii_dificuldades');

        $validator
            ->allowEmpty('parecer_ioge_desempenho');

        $validator
            ->allowEmpty('parecer_ioge_dificuldades');

        $validator
            ->allowEmpty('parecer_ioge_observacoes');

        $validator
            ->date('data_realizacao_marco_50')
            ->allowEmpty('data_realizacao_marco_50');

        $validator
            ->date('data_realizacao_marco_100')
            ->allowEmpty('data_realizacao_marco_100');

        $validator
            ->date('data_realizacao_avaliacao')
            ->allowEmpty('data_realizacao_avaliacao');

        $validator
            ->allowEmpty('descricao_processo_ii');

        $validator
            ->allowEmpty('descricao_processo_ia');

        $validator
            ->integer('ativo')
            ->notEmpty('ativo');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['grupo_empresas_id'], 'GruposEmpresas'));
        $rules->add($rules->existsIn(['unidade_organizacional_id'], 'UnidadesOrganizacionais'));
        $rules->add($rules->existsIn(['instituicao_implementadora_id'], 'InstituicoesImplementadoras'));
        $rules->add($rules->existsIn(['instituicao_avaliadora_id'], 'InstituicoesAvaliadoras'));
        return $rules;
    }
}
