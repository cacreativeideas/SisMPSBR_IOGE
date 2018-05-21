<div class="problemas form">
    <?= $this->Form->create($problema) ?>
    <fieldset>
        <legend><?= __('Adicionar Problema') ?></legend>
        <?php
        echo $this->Form->input('projeto_id', ['empty' => 'Selecione', 'options' => $projetos, 'required' => 'required']);
        echo $this->Form->input('descricao', ['label' => 'Descrição']);

        $options = [
            'Muito Baixo' => 'Muito Baixo',
            'Baixo' => 'Baixo',
            'Moderado' => 'Moderado',
            'Alto' => 'Alto',
            'Muito Alto' => 'Muito Alto'
        ];

        echo $this->Form->input('impacto', ['label' => 'Impacto', 'empty' => 'Selecione', 'options' => $options ] , ['required' => 'required']);

        echo $this->Form->input('acao_contingencia', ['label' => 'Ação de Contingência']);
        echo $this->Form->input('data_acompanhamento', ['label' => 'Data de Acompanhamento', 'type'=>'text']);


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
