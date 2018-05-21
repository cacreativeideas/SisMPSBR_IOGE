<?php
namespace App\Model\Table;

use App\Model\Entity\InstituicoesImplementadora;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InstituicoesImplementadoras Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Instituicoes
 */
class InstituicoesImplementadorasTable extends Table
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

        $this->table('instituicoes_implementadoras');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Instituicoes', [
            'foreignKey' => 'instituicao_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Projetos', [
            'foreignKey' => 'instituicao_implementadora_id'
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
            ->requirePresence('nome_contato', 'create')
            ->notEmpty('nome_contato');

        $validator
            ->requirePresence('email_contato', 'create')
            ->notEmpty('email_contato');

        $validator
            ->requirePresence('telefone_contato', 'create')
            ->notEmpty('telefone_contato');

        $validator
            ->allowEmpty('modelo_referencia', 'create')
            ->add('role', 'inList', [
                'rule' => ['inList', ['MR-MPS-SW', 'MR-MPS-SV']],
                'message' => 'Please enter a valid modelo'
            ]);

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
        $rules->add($rules->existsIn(['instituicao_id'], 'Instituicoes'));
        return $rules;
    }
}
