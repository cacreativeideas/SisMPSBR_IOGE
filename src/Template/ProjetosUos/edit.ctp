<div class="projetosUos form">
    <?= $this->Form->create($projetosUo) ?>
    <fieldset>
        <legend><?= __('Editar Projetos da UO') ?></legend>
        <?php
            echo "<div class='input text required'>";
            echo $this->Form->label('empresa_id','Empresa');
            echo $this->Form->select('empresa_id', $empresas , ['empty' => 'Selecione'] , ['required'=>'required']);
            echo "</div>";
            echo $this->Form->input('unidade_organizacional_id', ['options' => $unidadesOrganizacionais, 'required'=>'required']);
            echo $this->Form->input('descricao', ['label'=>'Descrição']);
            //echo $this->Form->input('status');
            echo $this->Form->input('status', [
                'label' => 'Status',
                'options' =>   [
                    'Iniciado' => 'Iniciado',
                    'Em Andamento' => 'Em Andamento',
                    'Concluído' => 'Concluído'
                ]
            ]);

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
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