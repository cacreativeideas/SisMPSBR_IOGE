<?php
namespace App\Model\Table;

use App\Model\Entity\UnidadesOrganizacional;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UnidadesOrganizacionais Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Empresas
 * @property \Cake\ORM\Association\BelongsTo $GruposEmpresas
 */
class UnidadesOrganizacionaisTable extends Table
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

        $this->table('unidades_organizacionais');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('GruposEmpresas', [
            'foreignKey' => 'grupo_empresas_id'
        ]);
        $this->hasMany('Projetos', [
            'foreignKey' => 'unidade_organizacional_id'
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
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->requirePresence('descricao_atividades', 'create')
            ->notEmpty('descricao_atividades');

        $validator
            ->requirePresence('nivel_mps', 'create')
            ->notEmpty('nivel_mps')
            ->add('role', 'inList', [
                'rule' => ['inList', ['G', 'F', 'F e G', 'E', 'D', 'C', 'B', 'A']],
                'message' => 'Please enter a valid nível'
            ]);

        $validator
            ->requirePresence('versao_modelo', 'create')
            ->notEmpty('versao_modelo');

        $validator
            ->requirePresence('modelo_referencia', 'create')
            ->notEmpty('modelo_referencia')
            ->add('role', 'inList', [
                'rule' => ['inList', ['MR-MPS-SW', 'MR-MPS-SV']],
                'message' => 'Please enter a valid modelo'
            ]);

        $validator
            ->allowEmpty('descricao_processo_uo');

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
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        $rules->add($rules->existsIn(['grupo_empresas_id'], 'GruposEmpresas'));
        return $rules;
    }
}
