<?php
namespace App\Model\Table;

use App\Model\Entity\Restituicao;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Restituicoes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Pagamentos
 * @property \Cake\ORM\Association\BelongsTo $UnidadesOrganizacionais
 */
class RestituicoesTable extends Table
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

        $this->table('restituicoes');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Pagamentos', [
            'foreignKey' => 'pagamento_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('UnidadesOrganizacionais', [
            'foreignKey' => 'unidade_organizacional_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('data_pagamento');

        $validator
            ->numeric('valor_restituicao')
            ->requirePresence('valor_restituicao', 'create')
            ->notEmpty('valor_restituicao');

        $validator
            ->requirePresence('data_notificacao', 'create')
            ->notEmpty('data_notificacao');

        $validator
            ->allowEmpty('observacoes');

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
        $rules->add($rules->existsIn(['pagamento_id'], 'Pagamentos'));
        $rules->add($rules->existsIn(['unidade_organizacional_id'], 'UnidadesOrganizacionais'));
        return $rules;
    }
}
