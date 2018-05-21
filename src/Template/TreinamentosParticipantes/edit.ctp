<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $treinamentosParticipante->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $treinamentosParticipante->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Treinamentos Participantes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Treinamentos'), ['controller' => 'Treinamentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treinamento'), ['controller' => 'Treinamentos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Colaboradores'), ['controller' => 'Colaboradores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Colaboradore'), ['controller' => 'Colaboradores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="treinamentosParticipantes form large-9 medium-8 columns content">
    <?= $this->Form->create($treinamentosParticipante) ?>
    <fieldset>
        <legend><?= __('Edit Treinamentos Participante') ?></legend>
        <?php
            echo $this->Form->input('treinamento_id', ['options' => $treinamentos]);
            echo $this->Form->input('colaborador_id', ['options' => $colaboradores]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
