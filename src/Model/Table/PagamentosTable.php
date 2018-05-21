<?php
namespace App\Model\Table;

use App\Model\Entity\Pagamento;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pagamentos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Projetos
 * @property \Cake\ORM\Association\HasMany $Parcelas
 * @property \Cake\ORM\Association\HasMany $Restituicoes
 */
class PagamentosTable extends Table
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

        $this->table('pagamentos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Projetos', [
            'foreignKey' => 'projeto_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Parcelas', [
            'foreignKey' => 'pagamento_id'
        ]);
        $this->hasMany('Restituicoes', [
            'foreignKey' => 'pagamento_id'
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
            ->numeric('valor_implementacao')
            ->requirePresence('valor_implementacao', 'create')
            ->notEmpty('valor_implementacao');

        $validator
            ->numeric('valor_avaliacao')
            ->requirePresence('valor_avaliacao', 'create')
            ->notEmpty('valor_avaliacao');

        $validator
            ->numeric('valor_total')
            ->requirePresence('valor_total', 'create')
            ->notEmpty('valor_total');

        $validator
            ->numeric('valor_softex')
            ->requirePresence('valor_softex', 'create')
            ->notEmpty('valor_softex');

        $validator
            ->numeric('valor_restante')
            ->requirePresence('valor_restante', 'create')
            ->notEmpty('valor_restante');

        $validator
            ->numeric('valor_pago_implementacao')
            ->allowEmpty('valor_pago_implementacao');

        $validator
            ->numeric('valor_pago_avaliacao')
            ->allowEmpty('valor_pago_avaliacao');

        $validator
            ->numeric('valor_gasto_total')
            ->allowEmpty('valor_gasto_total');

        $validator
            ->allowEmpty('justificativa_recursos_terceiros');

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
        $rules->add($rules->existsIn(['projeto_id'], 'Projetos'));
        return $rules;
    }
}
