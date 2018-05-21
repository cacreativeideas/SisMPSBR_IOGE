<div class="projetos form">
    <?= $this->Form->create($projeto, [
        'id' => 'EditProjetoForm'
    ]) ?>
    <fieldset>
        <legend><?= __('Editar Projeto de Grupo de Empresas') ?></legend>

        <table id="table"
               data-classes="table-responsive"
               data-locale="pt-BR"

            <thead>

            <tr>
                <th rowspan="2" data-field="idProjeto" data-visible="false">ID Projeto</th>
                <th rowspan="2" data-field="idGrupo" data-visible="false">ID Grupo Empresas</th>
                <th rowspan="2" data-field="idUO" data-visible="false">ID UO</th>
                <th rowspan="2" data-field="empresa">Empresa</th>
                <th rowspan="2" data-field="uo">Unidade <br/> Organizacional</th>
                <th rowspan="2" data-field="nivelMPS">Nível <br/> MPS</th>
                <th colspan="2" data-halign="center">Datas</th>
                <th colspan="3" data-halign="center">Datas Previstas</th>
                <th colspan="3" data-halign="center">Datas Realização</th>
            </tr>
            <tr>
                <th data-field="dataAssinaturaConvenio"
                    data-editable="true"
                    data-editable-type="combodate"
                    data-editable-viewformat="DD/MM/YYYY"
                    data-editable-template="DD / MM / YYYY"
                    data-editable-emptytext="Insira Data">Assinatura <br/> Convênio</th>

                <th data-field="dataInicioImplementacao"
                    data-editable="true"
                    data-editable-type="combodate"
                    data-editable-viewformat="DD/MM/YYYY"
                    data-editable-template="DD / MM / YYYY"
                    data-editable-emptytext="Insira Data">Inicio <br/> Implementação</th>

                <th data-field="dataPrevistaMarco50"
                    data-editable="true"
                    data-editable-type="combodate"
                    data-editable-viewformat="DD/MM/YYYY"
                    data-editable-template="DD / MM / YYYY"
                    data-editable-emptytext="Insira Data">Marco <br/> 50%</th>

                <th data-field="dataPrevistaMarco100"
                    data-editable="true"
                    data-editable-type="combodate"
                    data-editable-viewformat="DD/MM/YYYY"
                    data-editable-template="DD / MM / YYYY"
                    data-editable-emptytext="Insira Data">Marco <br/> 100%</th>

                <th data-field="dataPrevistaAvaliacao"
                    data-editable="true"
                    data-editable-type="combodate"
                    data-editable-viewformat="DD/MM/YYYY"
                    data-editable-template="DD / MM / YYYY"
                    data-editable-emptytext="Insira Data">Avaliação</th>

                <th data-field="dataRealizacaoMarco50"
                    data-editable="true"
                    data-editable-type="combodate"
                    data-editable-viewformat="DD/MM/YYYY"
                    data-editable-template="DD / MM / YYYY"
                    data-editable-emptytext="Insira Data">Marco <br/> 50%</th>

                <th data-field="dataRealizacaoMarco100"
                    data-editable="true"
                    data-editable-type="combodate"
                    data-editable-viewformat="DD/MM/YYYY"
                    data-editable-template="DD / MM / YYYY"
                    data-editable-emptytext="Insira Data">Marco <br/> 100%</th>

                <th data-field="dataRealizacaoAvaliacao"
                    data-editable="true"
                    data-editable-type="combodate"
                    data-editable-viewformat="DD/MM/YYYY"
                    data-editable-template="DD / MM / YYYY"
                    data-editable-emptytext="Insira Data">Avaliação</th>
            </tr>
            </thead>
        </table>

    </fieldset>
    <?= $this->Form->button(__('Submit'), ['type' => 'button', 'onclick' => 'salvarDados();', 'class' => 'pull-right' ]) ?>
    <?= $this->Form->end() ?>
</div>

<script type="application/javascript">
    var $table = $('#table');
    var dataForTable = <?php echo $projetoTable; ?>;

    $(document).ready(function(){
        $table.bootstrapTable({data: dataForTable});

        $('.editable-input input').inputmask({
            mask: '99/99/9999'
        });

        $table.bootstrapTable({
            onLoadSuccess   :   function (){
                $table.bootstrapTable('hideLoading');
            }
        });
    });

    function salvarDados(){
        $.ajax({
            url         :   "<?php echo $this->Url->build(array('action'=>'add')); ?>",
            dataType    :   'json',
            type        :   'POST',
            data        :   JSON.stringify($table.bootstrapTable('getData')),
            'success'   :   function (data) {
                window.location.href = "<?php echo $this->Url->build(array('controller'=>'GruposEmpresas','action'=>'index')); ?>";
            }
        });
    }

</script>