<?php
namespace App\Model\Table;

use App\Model\Entity\Instituicao;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Instituicoes Model
 *
 * @property \Cake\ORM\Association\HasMany $InstituicoesAvaliadoras
 * @property \Cake\ORM\Association\HasMany $InstituicoesImplementadoras
 * @property \Cake\ORM\Association\HasMany $InstituicoesOrganizadoras
 */
class InstituicoesTable extends Table
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

        $this->table('instituicoes');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('InstituicoesAvaliadoras', [
            'foreignKey' => 'instituicao_id'
        ]);
        $this->hasMany('InstituicoesImplementadoras', [
            'foreignKey' => 'instituicao_id'
        ]);
        $this->hasMany('InstituicoesOrganizadoras', [
            'foreignKey' => 'instituicao_id'
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
            ->requirePresence('telefone', 'create')
            ->notEmpty('telefone');

        $validator
            ->requirePresence('website', 'create')
            ->notEmpty('website');

        $validator
            //->notEmpty('logo', 'Insira uma logo', 'create')
            ->allowEmpty('logo');

        return $validator;
    }

}
