<div class="licoesAprendidas form">
    <?= $this->Form->create($licoesAprendida) ?>
    <fieldset>
        <legend><?= __('Editar Lição Aprendida') ?></legend>
        <?php
        echo $this->Form->input('projeto_id', ['label' => 'Projeto', 'empty' => 'Selecione', 'options' => $projetos, 'required' => 'required'] );
        echo $this->Form->input('topico_id', ['label' => 'Tópico', 'empty' => 'Selecione', 'options' => $topicos, 'required' => 'required']);
        echo $this->Form->input('licao_aprendida', ['label' => 'Lição', 'type' => 'textarea']);
        echo $this->Form->input('ocorrencia', ['label' => 'Ocorrência', 'type' => 'textarea']);
        echo $this->Form->input('impacto', ['label' => 'Impacto no Projeto', 'type' => 'textarea']);
        echo $this->Form->input('data_identificacao', [ 'label' => 'Data do Registro', 'type' => 'text'] );

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script type="application/javascript">
    $(document).ready(function(){
        $('#data-identificacao').datetimepicker({
            format: 'DD/MM/YYYY'
        });

        $('#data-identificacao').inputmask({
            mask: '99/99/9999'
        });

    });
</script>