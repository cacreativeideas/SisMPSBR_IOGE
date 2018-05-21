<?php
namespace App\Model\Table;

use App\Model\Entity\LicoesAprendida;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LicoesAprendidas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Projetos
 * @property \Cake\ORM\Association\BelongsTo $Topicos
 */
class LicoesAprendidasTable extends Table
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

        $this->table('licoes_aprendidas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Projetos', [
            'foreignKey' => 'projeto_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Topicos', [
            'foreignKey' => 'topico_id',
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
            ->requirePresence('licao_aprendida', 'create')
            ->notEmpty('licao_aprendida');

        $validator
            ->requirePresence('ocorrencia', 'create')
            ->notEmpty('ocorrencia');

        $validator
            ->requirePresence('impacto', 'create')
            ->notEmpty('impacto');

        $validator
            ->requirePresence('influencia', 'create')
            ->notEmpty('influencia');

        $validator
            ->requirePresence('data_identificacao', 'create')
            ->notEmpty('data_identificacao');

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
        $rules->add($rules->existsIn(['topico_id'], 'Topicos'));
        return $rules;
    }
}
