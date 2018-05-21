<?php
namespace App\Model\Table;

use App\Model\Entity\Treinamento;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Treinamentos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Usuarios
 * @property \Cake\ORM\Association\BelongsTo $Consultores
 * @property \Cake\ORM\Association\BelongsTo $GruposEmpresas
 * @property \Cake\ORM\Association\HasMany $TreinamentosParticipantes
 */
class TreinamentosTable extends Table
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

        $this->table('treinamentos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('GruposEmpresas', [
            'foreignKey' => 'grupo_empresas_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('TreinamentosParticipantes', [
            'foreignKey' => 'treinamento_id'
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
            ->requirePresence('local', 'create')
            ->notEmpty('local');

        $validator
            ->requirePresence('endereco', 'create')
            ->notEmpty('endereco');

        $validator
            ->requirePresence('cidade', 'create')
            ->notEmpty('cidade');

        $validator
            ->requirePresence('estado', 'create')
            ->notEmpty('estado');

        $validator
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

        $validator
            ->requirePresence('preletor', 'create')
            ->notEmpty('preletor');

        $validator
            ->requirePresence('data_inicio', 'create')
            ->notEmpty('data_inicio');

        $validator
            ->requirePresence('data_fim', 'create')
            ->notEmpty('data_fim');

        $validator
            ->requirePresence('total_horas', 'create')
            ->notEmpty('total_horas');

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
        return $rules;
    }
}
