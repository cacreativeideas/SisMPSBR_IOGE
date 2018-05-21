<div class="gruposEmpresas form">
    <?= $this->Form->create($gruposEmpresa) ?>
    <fieldset>
        <legend><?= __('Editar Grupo de Empresas') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('edital_associado');


            echo $this->Form->input('descricao_obrigatoriedades',
                ['label'=>'Descrição das Obrigatoriedades', 'empty' => true]);
            echo $this->Form->input('descricao_penalidades',
                ['label'=>'Descrição das Penalidades', 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
