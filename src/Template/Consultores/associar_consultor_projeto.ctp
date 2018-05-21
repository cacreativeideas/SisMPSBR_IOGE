<div class="gruposEmpresas form">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Associar Consultor a Projeto de Implementação') ?></legend>
        <?php
        /*
        echo "<div class='input select required'>";
        echo $this->Form->label('grupo_empresa_id', 'Grupo de Empresas');
        echo $this->Form->select('grupo_empresa_id', $gruposEmpresas, ['required' => true, 'empty' => 'Selecione Grupo de Empresas']);
        echo "</div>";

        echo "<div class='input select required'>";
        echo $this->Form->label('empresa_id', 'Empresa');
        echo $this->Form->select('empresa_id', $empresas, ['required' => true, 'empty' => 'Selecione Empresa']);
        echo "</div>";

        echo "<div class='input select required'>";
        echo $this->Form->label('unidade_organizacional_id', 'Unidade Organizacional');
        echo $this->Form->select('unidade_organizacional_id', $uos, ['required' => true, 'empty' => 'Selecione Unidade Organizacional']);
        echo "</div>";
        */
        ?>

        <?= $this->Form->input('projeto_id', [
            'label' => 'Projeto',
            'empty' => 'Selecione',
            'required' => 'required',
            'options' => $projetos] ); ?>

        <table id="table"
               data-classes="table-responsive"
               data-locale="pt-BR"
               data-unique-id="idConsultor"
               data-click-to-select="true">
            <thead>
            <tr>
                <th data-field="id" data-visible="false">ID Consultor</th>
                <th data-field="idProjeto" data-visible="false">ID Projeto</th>
                <th data-field="associado"
                    data-checkbox="true"
                    data-formatter="stateFormatter"></th>
                <th data-field="nome">Consultor</th>
                <th data-field="modeloReferencia">Modelo de Referência</th>
            </tr>
            </thead>
        </table>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['type' => 'button', 'onclick' => 'salvarDados();', 'class' => 'pull-right' ]) ?>
    <?= $this->Form->end() ?>
</div>


<script type="application/javascript">
    var $table = $('#table');
    var dataForTable = <?php echo $consultores; ?>;
    var consultoresProjeto = [];
  
    function stateFormatter(value, row, index) {
        /*
        $(consultoresProjeto).each(function(index, consultor)){
            if (row.id == index ) {
                return {
                    disabled: true,
                    checked: true
                }
            }
        }
        */
        return value;
    }

    function getIdSelections() {
        return $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.id
        });
    }

    function salvarDados(){
        selections = getIdSelections();

        console.log(selections);

        $(selections).each(function(index, value) {
            //console.log(value);
            $table.bootstrapTable('updateByUniqueId', {
                id: value,
                row: {
                    idProjeto: $("[name='projeto_id']").val()
                }
            });
        });

        console.log($table.bootstrapTable('getData'));

        $.ajax({
            url         :   "<?php echo $this->Url->build(array('action'=>'associarConsultorProjeto')); ?>",
            dataType    :   'json',
            type        :   'POST',
            data        :   JSON.stringify($table.bootstrapTable('getData')),
            success     :   function (data) {
                window.location.href = "<?php echo $this->Url->build(array('controller'=>'Consultores','action'=>'index')); ?>";
            },
            error       : function(xhr) { // if error occured
                alert("Error occured.please try again");
                console.log(xhr.statusText + xhr.responseText);
            }
        });

    }

    $(function () {
        $table.bootstrapTable({data: dataForTable});
    });
  
</script>