<div class="instituicoes form">
    <?= $this->Form->create($instituicao, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Editar Instituição') ?></legend>
        <?php
            echo $this->Form->input('razao_social');
            echo $this->Form->input('cnpj');
            echo $this->Form->input('nome');
            echo $this->Form->input('endereco');
            echo $this->Form->input('telefone');
            echo $this->Form->input('website');
            echo $this->Form->input('logo',
                ['type' => 'file', 'label' => 'Inserir Logo']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
