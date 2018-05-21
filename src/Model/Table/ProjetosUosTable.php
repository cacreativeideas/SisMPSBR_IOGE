<?php
namespace App\Model\Table;

use App\Model\Entity\ProjetosUo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjetosUos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $UnidadesOrganizacionais
 */
class ProjetosUosTable extends Table
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

        $this->table('projetos_uos');
        $this->displayField('id');
        $this->primaryKey('id');

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
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status')
            ->add('role', 'inList', [
                'rule' => ['inList', ['Iniciado', 'Em Andamento', 'Concluído']],
                'message' => 'Please enter a valid porte'
            ]);

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
        $rules->add($rules->existsIn(['unidade_organizacional_id'], 'UnidadesOrganizacionais'));
        return $rules;
    }
}
