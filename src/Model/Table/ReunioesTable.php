<?php
namespace App\Model\Table;

use App\Model\Entity\Reuniao;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reunioes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $InstituicoesImplementadoras
 * @property \Cake\ORM\Association\BelongsTo $UnidadesOrganizacionais
 * @property \Cake\ORM\Association\HasMany $Acoes
 */
class ReunioesTable extends Table
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

        $this->table('reunioes');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('InstituicoesImplementadoras', [
            'foreignKey' => 'instituicao_implementadora_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('UnidadesOrganizacionais', [
            'foreignKey' => 'unidade_organizacional_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Acoes', [
            'foreignKey' => 'reuniao_id'
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
            ->requirePresence('data_realizacao', 'create')
            ->notEmpty('data_realizacao');

        $validator
            ->requirePresence('hora_inicio', 'create')
            ->notEmpty('hora_inicio');

        $validator
            ->requirePresence('hora_fim', 'create')
            ->notEmpty('hora_fim');

        $validator
            ->requirePresence('local_reuniao', 'create')
            ->notEmpty('local_reuniao');

        $validator
            ->requirePresence('nome_redator', 'create')
            ->notEmpty('nome_redator');

        $validator
            ->requirePresence('objetivo', 'create')
            ->notEmpty('objetivo');

        $validator
            ->requirePresence('discussao', 'create')
            ->notEmpty('discussao');

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
        $rules->add($rules->existsIn(['instituicao_implementadora_id'], 'InstituicoesImplementadoras'));
        $rules->add($rules->existsIn(['unidade_organizacional_id'], 'UnidadesOrganizacionais'));
        return $rules;
    }
}
