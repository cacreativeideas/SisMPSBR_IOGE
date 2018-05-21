<div class="riscos form">
    <?= $this->Form->create($risco) ?>
    <fieldset>
        <legend><?= __('Editar Risco') ?></legend>
        <?php

        echo $this->Form->input('projeto_id', ['options' => $projetos, 'required' => 'required']);
        echo $this->Form->input('descricao', ['label' => 'Descrição']);

        $options = [
            'Muito Baixo' => 'Muito Baixo',
            'Baixo' => 'Baixo',
            'Moderado' => 'Moderado',
            'Alto' => 'Alto',
            'Muito Alto' => 'Muito Alto'
        ];

        echo $this->Form->input('probabilidade', ['label' => 'Probabilidade', 'empty' => 'Selecione', 'options' => $options ], ['required' => 'required']);

        echo $this->Form->input('impacto', ['label' => 'Impacto', 'empty' => 'Selecione', 'options' => $options ] , ['required' => 'required']);

        echo $this->Form->input('severidade', ['label' => 'Severidade' ] , ['required' => 'required']);

        echo $this->Form->input('acao_prevencao', ['label' => 'Ação de Mitigação']);
        echo $this->Form->input('acao_contingencia', ['label' => 'Ação de Contingência']);
        echo $this->Form->input('data_acompanhamento', ['label' => 'Data de Acompanhamento', 'type'=>'text']);

        $optionsRisco = [
            'Acompanhando' => 'Acompanhando',
            'Ocorrido' => 'Ocorrido',
            'Finalizado' => 'Finalizado'
        ];

        echo $this->Form->input('situacao', ['label' => 'Situação', 'empty' => 'Selecione', 'options' => $optionsRisco ], ['required' => 'required']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>


<script type="application/javascript">
    $(document).ready(function(){
        $('#data-acompanhamento').datetimepicker({
            format: 'DD/MM/YYYY'
        });

        $('#data-acompanhamento').inputmask({
            mask: '99/99/9999'
        });

    });
</script>