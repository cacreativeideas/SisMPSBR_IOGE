<div class="topicos form">
    <?= $this->Form->create($topico) ?>
    <fieldset>
        <legend><?= __('Editar Tópico') ?></legend>
        <?php
        echo $this->Form->input('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
