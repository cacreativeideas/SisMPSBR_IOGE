<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InstituicoesImplementadora Entity.
 *
 * @property int $id
 * @property string $nome_contato
 * @property string $email_contato
 * @property string $telefone_contato
 * @property int $instituicao_id
 * @property \App\Model\Entity\Instituicao $instituicao
 * @property string $modelo_referencia
 * @property int $ativo
 * @property \App\Model\Entity\Projeto[] $projetos
 */
class InstituicoesImplementadora extends Entity
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
}
