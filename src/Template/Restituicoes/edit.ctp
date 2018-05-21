<div class="restituicoes form">
    <?= $this->Form->create($restituicao) ?>
    <fieldset>
        <legend><?= __('Editar Restituição') ?></legend>
        <?php
        echo $this->Form->input('pagamento_id',
            ['options' => $pagamentos, 'required' => 'required', 'empty' => 'Selecione']);
        echo $this->Form->input('unidade_organizacional_id',
            ['options' => $unidadesOrganizacionais, 'required' => 'required', 'empty' => 'Selecione']);
        ?>

        <div class="large-6 columns">
            <?php
            echo $this->Form->input('data_notificacao', ['label' => 'Data do Envio da Notificação', 'type' => 'text']);
            ?>
        </div>

        <div class="large-6 columns">
            <?php
            echo $this->Form->input('data_pagamento', ['label' => 'Data do Pagamento', 'type' => 'text', 'empty' => true]);
            //echo $this->Form->input('valor_parcela');
            ?>
        </div>

        <div class="input text">
            <label for="valor-restituicao">Valor da Restituição</label>
            <div class="input-group m-b-1">
                <span class="input-group-addon">$</span>
                <input id="valor-restituicao" type="text" name="valor_restituicao" class="form-control"
                       maxlength="45" required="required">
                <span class="input-group-addon">.00</span>
            </div>
        </div>

        <?php
        echo $this->Form->input('observacoes', ['label' => 'Observações', 'type' => 'textarea']);
        ?>

    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script type="application/javascript">
    $(function() {

        $('#data-notificacao').datetimepicker({
            format: 'DD/MM/YYYY'
        });

        $('#data-notificacao').inputmask({
            mask: '99/99/9999'
        });

        $('#data-pagamento').datetimepicker({
            format: 'DD/MM/YYYY'
        });

        $('#data-pagamento').inputmask({
            mask: '99/99/9999'
        });

    });
</script>
