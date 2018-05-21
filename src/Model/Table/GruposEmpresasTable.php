<?php
namespace App\Model\Table;

use App\Model\Entity\GruposEmpresa;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GruposEmpresas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $InstituicoesOrganizadoras
 */
class GruposEmpresasTable extends Table
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

        $this->table('grupos_empresas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('InstituicoesOrganizadoras', [
            'foreignKey' => 'instituicao_organizadora_id'
        ]);
        $this->hasMany('UnidadesOrganizacionais', [
            'foreignKey' => 'grupo_empresas_id'
        ]);
        $this->hasMany('Projetos', [
            'foreignKey' => 'grupo_empresas_id'
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
            ->requirePresence('edital_associado', 'create')
            ->notEmpty('edital_associado');
        
        $validator
            ->allowEmpty('descricao_penalidades');

        $validator
            ->allowEmpty('descricao_obrigatoriedades');

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
