<div class="topicos form">
    <?= $this->Form->create($topico) ?>
    <fieldset>
        <legend><?= __('Adicionar Tópico') ?></legend>
        <?php
            echo $this->Form->input('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
