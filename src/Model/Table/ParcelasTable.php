<?php
namespace App\Model\Table;

use App\Model\Entity\Parcela;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Parcelas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Pagamentos
 */
class ParcelasTable extends Table
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

        $this->table('parcelas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Pagamentos', [
            'foreignKey' => 'pagamento_id',
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
            ->numeric('valor_parcela')
            ->allowEmpty('valor_parcela');

        $validator
            ->requirePresence('data_prevista_pagamento', 'create')
            ->notEmpty('data_prevista_pagamento');

        $validator
            ->requirePresence('tipo_parcela', 'create')
            ->notEmpty('tipo_parcela')
            ->add('tipo_parcela', 'inList', [
                'rule' => ['inList', ['entrada', 'saida']],
                'message' => 'Please enter a valid tipo de pagamento'
            ]);

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
        return $rules;
    }
}
