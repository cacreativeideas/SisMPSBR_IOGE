<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Usuario Entity.
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $endereco
 * @property string $telefone
 * @property string $password
 * @property string $role
 * @property int $ativo
 * @property \App\Model\Entity\Acao[] $acoes
 * @property \App\Model\Entity\Colaborador[] $colaboradores
 * @property \App\Model\Entity\Consultor[] $consultores
 * @property \App\Model\Entity\Treinamento[] $treinamentos
 */
class Usuario extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
