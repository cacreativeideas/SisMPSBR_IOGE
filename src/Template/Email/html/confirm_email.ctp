<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<p>Olá <?= $nome ?>, </p>

<p>Sua conta no sistema SisMPS IOGE foi criada com sucesso.</p>

<p>Para ter acesso ao sistema é necessário cadastrar uma senha clicando no seguinte link:</p>

<?
    $url = "http://localhost:8888/" . $this->Url->build([
        "controller" => "Usuarios",
        "action" => "setSenha",
        $cod_verificador
    ]); ?>
<?=
$this->Html->link("Redirecionar para Cadastro de Senha",
    ['controller' => 'Usuarios', 'action' => 'setSenha', $cod_verificador],
    ['escape'=>false, 'class' => 'btn btn-default m-b-2']);
?>

<p>Se você não solicitou seu cadastro no SisMPS IOGE, favor desconsiderar este email.</p>

<br />
<br />

<p>Time SisMPS IOGE</p>
<br />
<br />
<p>This message was sent from an unmonitored email address. Please do not reply to this message</p>