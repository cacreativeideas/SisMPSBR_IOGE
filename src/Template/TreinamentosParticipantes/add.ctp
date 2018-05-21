<div class="treinamentosParticipantes form">
    <?= $this->Form->create($treinamentosParticipante) ?>
    <fieldset>
        <legend><?= __('Adicionar Participantes do Treinamento') ?></legend>
        <?php
            echo $this->Form->input('treinamento_id', ['options' => $treinamentos]);
            echo $this->Form->input('nome_participante[0]', ['label' => 'Nome Participante']);
            echo $this->Form->input('empresa_id', ['label' => 'Empresa', 'options' => $empresas]);
        ?>
      
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
