<div class="gruposEmpresas form">
    <?= $this->Form->create($gruposEmpresa) ?>
    <fieldset>
        <legend><?= __('Adicionar Grupo de Empresas') ?></legend>
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

<script type="application/javascript">
    $(function() {

        $("[name='empresa_id']").change(function(){
            var selectedValue = $(this).val();
            $.ajax({
                url:"<?php echo $this->Url->build(array('action'=>'listuobyempresa')); ?>/"+selectedValue,
                dataType:'json',
                type: 'POST',
                'success': function(data) {
                    var html="";

                    $.each(data['uos'], function(i, item) {
                        html = html+'<option value="'+i+'">'+item+'</option>';
                    })

                    $('#unidade-organizacional-id').html(html);
                }
            });
        });

    });
</script>
