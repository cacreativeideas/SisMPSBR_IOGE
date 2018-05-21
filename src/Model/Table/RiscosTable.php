<?php
namespace App\Model\Table;

use App\Model\Entity\Risco;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Riscos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Projetos
 * @property \Cake\ORM\Association\BelongsTo $Consultores
 */
class RiscosTable extends Table
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

        $this->table('riscos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Projetos', [
            'foreignKey' => 'projeto_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Consultores', [
            'foreignKey' => 'consultor_id',
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
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

        $validator
            ->requirePresence('acao_prevencao', 'create')
            ->notEmpty('acao_prevencao');

        $validator
            ->requirePresence('acao_contingencia', 'create')
            ->notEmpty('acao_contingencia');

        $validator
            ->requirePresence('data_acompanhamento', 'create')
            ->notEmpty('data_acompanhamento');

        $validator
            ->requirePresence('situacao', 'create')
            ->notEmpty('situacao');

        $validator
            ->requirePresence('impacto', 'create')
            ->notEmpty('impacto');

        $validator
            ->requirePresence('probabilidade', 'create')
            ->notEmpty('probabilidade');

        $validator
            ->requirePresence('severidade', 'create')
            ->notEmpty('severidade');

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
        $rules->add($rules->existsIn(['consultor_id'], 'Consultores'));
        return $rules;
    }
}
