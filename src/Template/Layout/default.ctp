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

$cakeDescription = 'SisMPS IOGE';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?> -
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('tether.min.css') ?>
    <?= $this->Html->css('jquery-ui.min.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('bootstrap-table.min.css') ?>
    <?= $this->Html->css('font-awesome.css') ?>
    <?= $this->Html->css('jasny-bootstrap.min.css') ?>
    <?= $this->Html->css('morris.css') ?>
    <?= $this->Html->css('metisMenu.css') ?>
    <?= $this->Html->css('custom.css') ?>

    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('jquery-ui.min.js') ?>
    <?= $this->Html->script('tether.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('jasny-bootstrap.min.js') ?>
    <?= $this->Html->script('bootstrap-table.min.js') ?>
    <?= $this->Html->script('bootstrap-table-pt-BR.js') ?>
    <?= $this->Html->script('moment.js') ?>
    <?= $this->Html->script('transition.js') ?>
    <?= $this->Html->script('collapse.js') ?>
    <?= $this->Html->script('bootstrap-datetimepicker.js') ?>
    <?= $this->Html->script('extensions/editable/bootstrap-table-editable.min.js') ?>
    <?= $this->Html->script('raphael-min.js') ?>
    <?= $this->Html->script('morris.min.js') ?>
    <?= $this->Html->script('metisMenu.js') ?>

    <?= $this->fetch('meta') ?>

    <?= $this->fetch('css') ?>
    <link rel="stylesheet" href="//rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css">

    <?= $this->fetch('script') ?>
    <script src="//rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/js/bootstrap-editable.js"></script>

</head>
<body>
<nav class="top-bar expanded" data-topbar role="navigation">
    <ul class="title-area large-2 medium-3 columns">
        <li class="name">
            <h1>
                <?php echo $this->Html->link($cakeDescription, ['controller' => 'InstituicoesOrganizadoras',
                    'action' => 'dashboard']); ?>
            </h1>
        </li>
    </ul>
    <div class="top-bar-section">
        <ul class="right">
            <li>
                <?php
                echo $this->Html->link("Sair <i class='fa fa-sign-out'></i>", [
                    'controller' => 'Usuarios',
                    'action' => 'logout',
                ], [
                    'escape' => false
                ]); ?>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid p-a-0 clearfix">

    <nav class="large-2 medium-3 columns p-a-0" id="actions-sidebar">
        <?= $this->element('sidebar') ?>
    </nav>
    
    <div class="large-10 medium-9 columns content">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>

</div>
<footer>
</footer>
</body>
</html>
