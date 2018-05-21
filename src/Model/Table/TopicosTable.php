<?php
namespace App\Model\Table;

use App\Model\Entity\Topico;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Topicos Model
 *
 * @property \Cake\ORM\Association\HasMany $LicoesAprendidas
 */
class TopicosTable extends Table
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

        $this->table('topicos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('LicoesAprendidas', [
            'foreignKey' => 'topico_id'
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
            ->integer('ativo')
            ->notEmpty('ativo');

        return $validator;
    }
}
