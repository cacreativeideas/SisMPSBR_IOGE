<?php
namespace App\Model\Table;

use App\Model\Entity\Consultor;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Consultores Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Usuarios
 * @property \Cake\ORM\Association\BelongsTo $InstituicoesImplementadoras
 * @property \Cake\ORM\Association\HasMany $Riscos
 * @property \Cake\ORM\Association\BelongsToMany $Projetos
 */
class ConsultoresTable extends Table
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

        $this->table('consultores');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('InstituicoesImplementadoras', [
            'foreignKey' => 'instituicao_implementadora_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Riscos', [
            'foreignKey' => 'consultor_id'
        ]);
        $this->belongsToMany('Projetos', [
            'foreignKey' => 'consultor_id',
            'targetForeignKey' => 'projeto_id',
            'joinTable' => 'consultores_projetos'
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
            ->integer('is_coordenador')
            ->allowEmpty('is_coordenador');

        $validator
            ->allowEmpty('modelo_referencia');

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
        $rules->add($rules->existsIn(['usuario_id'], 'Usuarios'));
        $rules->add($rules->existsIn(['instituicao_implementadora_id'], 'InstituicoesImplementadoras'));
        return $rules;
    }
}
