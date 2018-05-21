<?php
namespace App\Model\Table;

use App\Model\Entity\Atividade;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Atividades Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Projetos
 * @property \Cake\ORM\Association\BelongsTo $Consultores
 */
class AtividadesTable extends Table
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

        $this->table('atividades');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Projetos', [
            'foreignKey' => 'projeto_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Consultores', [
            'foreignKey' => 'consultor_planejado_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Consultores', [
            'foreignKey' => 'consultor_realizado_id',
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
            ->requirePresence('tipo_atividade', 'create')
            ->notEmpty('tipo_atividade');

        $validator
            //->date('data_inicio_planejada')
            ->requirePresence('data_inicio_planejada', 'create')
            ->notEmpty('data_inicio_planejada');

        $validator
            //->date('data_inicio_realizada')
            ->allowEmpty('data_inicio_realizada');

        $validator
            //->date('data_fim_planejada')
            ->requirePresence('data_fim_planejada', 'create')
            ->notEmpty('data_fim_planejada');

        $validator
            //->date('data_fim_realizada')
            ->allowEmpty('data_fim_realizada');

        $validator
            ->requirePresence('situacao', 'create')
            ->notEmpty('situacao');

        $validator
            //->time('total_horas')
            ->allowEmpty('total_horas');

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
        $rules->add($rules->existsIn(['consultor_planejado_id'], 'Consultores'));
        $rules->add($rules->existsIn(['consultor_realizado_id'], 'Consultores'));
        return $rules;
    }
}
