<div class="gruposEmpresas form">
    <?= $this->Form->create($gruposEmpresa) ?>
    <fieldset>
        <legend><?= __('Associar UO a Grupo de Empresas') ?></legend>
        <?php
        echo "<div class='input select required'>";
        echo $this->Form->label('id', 'Grupo de Empresas');
        echo $this->Form->select('id', $gruposEmpresas,
            [
                'required' => true,
                'empty' => 'Selecione Grupo de Empresas'
            ]);
        echo "</div>";
        echo "<div class='input select required'>";
        echo $this->Form->label('empresa_id', 'Empresa');
        echo $this->Form->select('empresa_id', $empresas,
            [
                'required' => true,
                'empty' => 'Selecione Empresa'
            ]);
        echo "</div>";
        echo "<div class='input select required'>";
        echo $this->Form->label('unidades_organizacionais.0.id', 'Unidade Organizacional');
        echo $this->Form->select('unidades_organizacionais.0.id', $uos,
            [
                'required' => true,
                'empty' => 'Selecione Unidade Organizacional'
            ]);
        echo "</div>";
        echo $this->Form->input('unidades_organizacionais.0.descricao_processo_uo',
            [
                'type'=> 'textarea',
                'label'=> 'Descrição do Processo de Seleção',
                'required' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script type="application/javascript">
    $(function() {

        $("[name='id']").change(function(){
            var selectedValue = $(this).val();
            $.ajax({
                url:"<?php echo $this->Url->build(array('action'=>'listempresabygrupo')); ?>/"+selectedValue,
                dataType:'json',
                type: 'POST',
                'success': function(data) {
                    var html="<option value=''>Selecione Empresa</option>";

                    $.each(data['empresas'], function(i, item) {
                        html += '<option value="'+i+'">'+item+'</option>';
                    })

                    $("[name='empresa_id']").html(html);
                }
            });
        });

        $("[name='empresa_id']").change(function(){
            var selectedValue = $(this).val();
            $.ajax({
                url:"<?php echo $this->Url->build(array('action'=>'listuobyempresa')); ?>/"+selectedValue,
                dataType:'json',
                type: 'POST',
                'success': function(data) {
                    var html="<option value=''>Selecione Unidade Organizacional</option>";

                    $.each(data['uos'], function(i, item) {
                        html += '<option value="'+i+'">'+item+'</option>';
                    })

                    $("[name='unidades_organizacionais[0][id]']").html(html);
                }
            });
        });

    });
</script>
