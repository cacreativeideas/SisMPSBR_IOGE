<div class="parcelas form">
    <?= $this->Form->create($parcela) ?>
    <fieldset>
        <legend><?= __('Editar Parcela') ?></legend>
        <?php
        echo $this->Form->input('pagamento_id', ['options' => $pagamentos, 'required' => 'required', 'empty' => 'Selecione']);
        ?>

        <?php
        $tipoPagamento = [
            'Entrada' => 'À Receber',
            'Saida' => 'À Pagar'
        ];

        echo $this->Form->input('tipo_parcela', [
            'label' => 'Tipo de Parcela',
            'empty' => 'Selecione',
            'options' => $tipoPagamento,
            'required' => 'required'
        ]);
        ?>

        <div class="large-6 columns">
            <?php
            echo $this->Form->input('data_prevista_pagamento', ['label' => 'Data Prevista do Pagamento', 'type' => 'text']);
            ?>
        </div>

        <div class="large-6 columns">
            <?php
            echo $this->Form->input('data_pagamento', ['label' => 'Data do Pagamento', 'type' => 'text', 'empty' => true]);
            //echo $this->Form->input('valor_parcela');
            ?>
        </div>

        <div class="input text">
            <label for="valor-parcela">Valor da Parcela</label>
            <div class="input-group m-b-1">
                <span class="input-group-addon">$</span>
                <input id="valor-parcela" type="text" name="valor_parcela" class="form-control"
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

        $('#data-prevista-pagamento').datetimepicker({
            format: 'DD/MM/YYYY'
        });

        $('#data-prevista-pagamento').inputmask({
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
