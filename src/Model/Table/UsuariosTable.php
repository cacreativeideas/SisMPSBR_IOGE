<?php
namespace App\Model\Table;

use App\Model\Entity\Usuario;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuarios Model
 *
 * @property \Cake\ORM\Association\HasMany $Acoes
 * @property \Cake\ORM\Association\HasMany $Consultores
 * @property \Cake\ORM\Association\HasMany $CoordenadoresIoges
 * @property \Cake\ORM\Association\HasMany $Treinamentos
 */
class UsuariosTable extends Table
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

        $this->table('usuarios');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Consultores', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->hasMany('CoordenadoresIoges', [
            'foreignKey' => 'usuario_id'
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
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->allowEmpty('endereco');

        $validator
            ->allowEmpty('telefone');

        $validator
            ->allowEmpty('password');

        $validator
            ->requirePresence('role', 'create')
            ->notEmpty('role')
            ->add('role', 'inList', [
                'rule' => ['inList', ['coord_ioge', 'coord_ii', 'consultor', 'admin']],
                'message' => 'Please enter a valid role'
            ]);

        $validator
            ->requirePresence('cod_verificador', 'create')
            ->notEmpty('cod_verificador');

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
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
