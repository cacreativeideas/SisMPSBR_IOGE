<div class="atividades form">
    <?= $this->Form->create($atividade) ?>

    <fieldset>
        <legend><?= __('Editar Atividade') ?></legend>
        <?php
        /*
            echo $this->Form->input('grupo_empresas_id',
                [
                    'required' => true,
                    'empty' => 'Selecione Grupo de Empresas',
                    'options' => $grupoEmpresas
                ]);
            echo $this->Form->input('empresa_id',
                [
                    'required' => true,
                    'empty' => 'Selecione Empresa'
                ]);
            echo $this->Form->input('unidade_organizacional_id',
                [
                    'required' => true,
                    'empty' => 'Selecione Unidade Organizacional'
                ]);
        */

        echo $this->Form->input('projeto_id', [
            'label' => 'Projeto',
            'empty' => 'Selecione',
            'options' => $projetos,
            'required' => 'required'
        ]);

        echo $this->Form->input('descricao', ['label' => 'Descrição']);
        echo $this->Form->input('tipo_atividade', [
                'label' => 'Tipo de Atividade',
                'empty' => 'Selecione',
                'options' => [
//                'Treinamento' => 'Treinamento',
//                'Reunião' => 'Reunião',
                    'Consultoria' => 'Consultoria',
                    'Avaliação' => 'Avaliação',
                    'Workshop' => 'Workshop',
                ]]
        );

        echo $this->Form->input('situacao', [
                'label' => 'Situação',
                'empty' => 'Selecione',
                'options' => [
                    'Planejada' => 'Planejada',
                    'Em Andamento' => 'Em Andamento',
                    'Já Realizada' => 'Já Realizada'
                ]]
        );
        ?>

        <div class="large-6 columns">
            <legend class="m-b-1">Planejado</legend>
            <?php
            echo $this->Form->input('consultor_planejado_id', [
                'options' => $consultores,
                'required' => true,
                'empty' => 'Selecione Consultor'
            ]);
            echo $this->Form->input('data_inicio_planejada',
                ['label' => 'Data Início', 'type' => 'text']);
            echo $this->Form->input('data_fim_planejada',
                ['label' => 'Data Final', 'type' => 'text']);
            ?>
        </div>
        <div class="large-6 columns">
            <legend class="m-b-1">Realizado</legend>
            <?php
            echo $this->Form->input('consultor_realizado_id', [
                'options' => $consultores,
                'empty' => 'Selecione Consultor'
            ]);
            echo $this->Form->input('data_inicio_realizada',
                ['label' => 'Data Início', 'type' => 'text']);
            echo $this->Form->input('data_fim_realizada',
                ['label' => 'Data Final', 'type' => 'text']);
            echo $this->Form->input('total_horas',
                ['label' => 'Total de Horas Gastas', 'type' => 'text']);

            //echo $this->Form->input('data_cadastro', ['empty' => true]);
            ?>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script type="application/javascript">
    $(function() {

        $('#data-inicio-planejada').datetimepicker({
            format: 'DD/MM/YYYY'
        });

        $('#data-inicio-planejada').inputmask({
            mask: '99/99/9999'
        });

        $('#data-fim-planejada').datetimepicker({
            format: 'DD/MM/YYYY'
        });

        $('#data-fim-planejada').inputmask({
            mask: '99/99/9999'
        });

        $('#data-inicio-realizada').datetimepicker({
            format: 'DD/MM/YYYY'
        });

        $('#data-inicio-realizada').inputmask({
            mask: '99/99/9999'
        });

        $('#data-fim-realizada').datetimepicker({
            format: 'DD/MM/YYYY'
        });

        $('#data-fim-realizada').inputmask({
            mask: '99/99/9999'
        });

        $("[name='grupo_empresas_id']").change(function(){
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
            var idEmpresa = $(this).val();
            var idGrupo = $("[name='grupo_empresas_id']").val();
            var url = "<?php echo $this->Url->build(array('action'=>'listuobyempresa')); ?>/"+idEmpresa+"/"+idGrupo;
            console.log(url);

            $.ajax({
                url:"<?php echo $this->Url->build(array('action'=>'listuobyempresa')); ?>/"+idEmpresa+"/"+idGrupo,
                dataType:'json',
                type: 'POST',
                'success': function(data) {
                    var html="<option value=''>Selecione Unidade Organizacional</option>";

                    $.each(data['uos'], function(i, item) {
                        html += '<option value="'+i+'">'+item+'</option>';
                    })

                    $("[name='unidade_organizacional_id']").html(html);
                }
            });
        });

        $("[name='unidade_organizacional_id']").change(function(){
            var selectedValue = $(this).val();
            $.ajax({
                url:"<?php echo $this->Url->build(array('action'=>'listprojetobyuo')); ?>/"+selectedValue,
                dataType:'json',
                type: 'POST',
                'success': function(data) {
                    console.log(data);
                    var html="<option value=''>Selecione Consultor</option>";

                    $.each(data['consultores'], function(i, item) {
                        html += '<option value="'+i+'">'+item+'</option>';
                    })

                    $("[name='consultor_planejado_id']").html(html);
                    $("[name='consultor_realizado_id']").html(html);
                }
            });
        });

    });
</script>
