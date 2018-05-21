<div class="gruposEmpresas form">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Associar Instituição Implementadora a Grupo de Empresas') ?></legend>
        <?php
        echo "<div class='input select required'>";
        echo $this->Form->label('grupo_empresa_id', 'Grupo de Empresas');
        echo $this->Form->select('grupo_empresa_id', $gruposEmpresas, ['required' => true, 'empty' => 'Selecione Grupo de Empresas']);
        echo "</div>";

        echo "<div class='input select required'>";
        echo $this->Form->label('instituicao_implementadora_id', 'Instituição Implementadora');
        echo $this->Form->select('instituicao_implementadora_id', $instituicoesImplementadoras, ['required' => true, 'empty' => 'Selecione Instituição Implementadora']);
        echo "</div>";

        echo $this->Form->input('descricao_processo_ii', ['type'=> 'textarea', 'label'=> 'Descrição do Processo de Seleção', 'required' => true]);

        ?>

        <table id="table"
               data-classes="table-responsive"
               data-locale="pt-BR"
               data-unique-id="idUO"
               data-click-to-select="true">
            <thead>
            <tr>
                <th data-field="idProjeto" data-visible="false">ID Projeto</th>
                <th data-field="idGrupo" data-visible="false">ID Grupo Empresas</th>
                <th data-field="idUO" data-visible="false">ID UO</th>
                <th data-field="idII" data-visible="false">ID II</th>
                <th data-field="descProcessoII" data-visible="false">Desc Processo II</th>
                <th data-field="associado"
                    data-checkbox="true"
                    data-formatter="stateFormatter"></th>
                <th data-field="empresa">Empresa</th>
                <th data-field="uo">Unidade Organizacional</th>
                <th data-field="nivelMPS">Nível MPS</th>
            </tr>
            </thead>
        </table>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['type' => 'button', 'onclick' => 'salvarDados();', 'class' => 'pull-right' ]) ?>
    <?= $this->Form->end() ?>
</div>


<script type="application/javascript">
    var $table = $('#table');
    var dataForTable = [];

    /*
    $table.on('check.bs.table ' +
        'check-all.bs.table', function () {

        selections = getIdSelections();

        $(selections).each(function(index, value) {
            //console.log(value);
            $table.bootstrapTable('updateByUniqueId', {
                id: value,
                row: {
                    idII: $("[name='instituicao_implementadora_id']").val()
                }
            });
        });
    });

    $table.on('uncheck.bs.table', function (e, row, element) {
        $table.bootstrapTable('updateByUniqueId', {
            id: row.idUO,
            row: {
                idII: null,
                descProcessoII: null
            }
        });
    });

    $table.on('uncheck-all.bs.table', function (e, rows) {
        $(rows).each(function(index, element) {
            $table.bootstrapTable('updateByUniqueId', {
                id: element.idUO,
                row: {
                    idII: null,
                    descProcessoII: null
                }
            });
        });
    });
    */

    function stateFormatter(value, row, index) {
//        if (row.idII != null) {
//            return {
//                disabled: true
//            };
//        }

        if (row.idII == $("[name='instituicao_implementadora_id']").val() ) {
            return {
                disabled: true,
                checked: true
            }
        }
        return value;
    }

    function getIdSelections() {
        return $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.idUO
        });
    }

    function salvarDados(){
        selections = getIdSelections();

        $(selections).each(function(index, value) {
            //console.log(value);
            $table.bootstrapTable('updateByUniqueId', {
                id: value,
                row: {
                    idII: $("[name='instituicao_implementadora_id']").val(),
                    descProcessoII: $("[name='descricao_processo_ii']").val()
                }
            });
        });

        $.ajax({
            url         :   "<?php echo $this->Url->build(array('action'=>'associarInstituicaoImplementadora')); ?>",
            dataType    :   'json',
            type        :   'POST',
            data        :   JSON.stringify($table.bootstrapTable('getData')),
            success     :   function (data) {
                window.location.href = "<?php echo $this->Url->build(array('controller'=>'GruposEmpresas','action'=>'index')); ?>";
            },
            error       : function(xhr) { // if error occured
                alert("Error occured.please try again");
                console.log(xhr.statusText + xhr.responseText);
            }
        });

    }

    $(function () {
        $table.bootstrapTable({data: dataForTable});

        $("[name='grupo_empresa_id']").change(function(){
            var selectedValue = $(this).val();
            $.ajax({
                url         :   "<?php echo $this->Url->build(array('action'=>'findProjetoByGrupo')); ?>/"+selectedValue,
                dataType    :   'json',
                type        :   'POST',
                'success'   :   function(data) {
                    $table.bootstrapTable('showLoading');
                    $table.bootstrapTable('destroy');
                    dataForTable = JSON.parse(data['retorno']);
                    $table.bootstrapTable('destroy');
                    $table.bootstrapTable({data: dataForTable});
                }
            });
        });

        $("[name='instituicao_implementadora_id']").change(function(){
            var selectedValue = $(this).val();
            var rows = $table.bootstrapTable('getData');
            var updateRows = [];

            $(rows).each(function(index, value) {
                if(value.idII == selectedValue) {
                    updateRows.push(value.idUO);
                }
            });

            $table.bootstrapTable('uncheckAll');
            $table.bootstrapTable('checkBy', {field:'idUO', values: updateRows});
        });

        $('#table').bootstrapTable({
            onLoadSuccess   :   function (){
                $table.bootstrapTable('hideLoading');
            }
        });
    });



</script>