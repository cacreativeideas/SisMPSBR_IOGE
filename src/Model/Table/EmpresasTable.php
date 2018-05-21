<?php
namespace App\Model\Table;

use App\Model\Entity\Empresa;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Empresas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $InstituicoesOrganizadoras
 * @property \Cake\ORM\Association\HasMany $UnidadesOrganizacionais
 */
class EmpresasTable extends Table
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

        $this->table('empresas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('InstituicoesOrganizadoras', [
            'foreignKey' => 'instituicao_organizadora_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('UnidadesOrganizacionais', [
            'foreignKey' => 'empresa_id'
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
            ->requirePresence('razao_social', 'create')
            ->notEmpty('razao_social');

        $validator
            ->requirePresence('cnpj', 'create')
            ->notEmpty('cnpj');

        $validator
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->requirePresence('endereco', 'create')
            ->notEmpty('endereco');

        $validator
            ->requirePresence('descricao_atividades', 'create')
            ->notEmpty('descricao_atividades');

        $validator
            ->requirePresence('porte', 'create')
            ->notEmpty('porte')
            ->add('role', 'inList', [
                'rule' => ['inList', ['Microempresa', 'Pequena', 'Média', 'Média-grande', 'Grande']],
                'message' => 'Please enter a valid porte'
            ]);

//        $validator
//            ->notEmpty('logo', 'Insira uma logo', 'create')
//            ->allowEmpty('logo', 'update');

        $validator
            ->requirePresence('website', 'create')
            ->notEmpty('website');

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
        $rules->add($rules->existsIn(['instituicao_organizadora_id'], 'InstituicoesOrganizadoras'));
        return $rules;
    }
}
