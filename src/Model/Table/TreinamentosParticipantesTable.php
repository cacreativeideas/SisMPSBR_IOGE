<?php
namespace App\Model\Table;

use App\Model\Entity\TreinamentosParticipante;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TreinamentosParticipantes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Treinamentos
 * @property \Cake\ORM\Association\BelongsTo $Empresas
 */
class TreinamentosParticipantesTable extends Table
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

        $this->table('treinamentos_participantes');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Treinamentos', [
            'foreignKey' => 'treinamento_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id',
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
            ->requirePresence('nome_participante', 'create')
            ->notEmpty('nome_participante');

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
        $rules->add($rules->existsIn(['treinamento_id'], 'Treinamentos'));
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        return $rules;
    }
}
