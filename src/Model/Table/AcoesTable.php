<?php
namespace App\Model\Table;

use App\Model\Entity\Acao;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Acoes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Reunioes
 */
class AcoesTable extends Table
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

        $this->table('acoes');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Reunioes', [
            'foreignKey' => 'reuniao_id',
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
            //->date('data_limite', 'dmy')
            ->requirePresence('data_limite', 'create')
            ->notEmpty('data_limite');

        $validator
            ->requirePresence('responsavel', 'create')
            ->notEmpty('responsavel');
      
        $validator
            ->requirePresence('situacao', 'create')
            ->notEmpty('situacao');

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
        $rules->add($rules->existsIn(['reuniao_id'], 'Reunioes'));
        return $rules;
    }
}
