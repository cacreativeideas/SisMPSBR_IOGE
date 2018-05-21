<div class="pagamentos form">
    <?= $this->Form->create($pagamento) ?>
    <fieldset>
        <legend><?= __('Editar Pagamento') ?></legend>

        <?php
            echo $this->Form->input('projeto_id', [
                'label' => 'Projeto',
                'empty' => 'Selecione',
                'options' => $projetos,
                'required' => 'required'
            ]);
        ?>

        <div class="input text required">
            <label for="valor-implementacao">Valor da Implementação</label>
            <div class="input-group m-b-1">
                <span class="input-group-addon">$</span>
                <input id="valor-implementacao" type="text" name="valor_implementacao" class="form-control"
                       maxlength="45" required="required">
                <span class="input-group-addon">.00</span>
            </div>
        </div>

        <div class="input text required">
            <label for="valor-avaliacao">Valor da Avaliação</label>
            <div class="input-group m-b-1">
                <span class="input-group-addon">$</span>
                <input id="valor-avaliacao" type="text" name="valor_avaliacao" class="form-control"
                       maxlength="45" required="required">
                <span class="input-group-addon">.00</span>
            </div>
        </div>

        <div class="input text required">
            <label for="valor-total">Valor Total</label>
            <div class="input-group m-b-1">
                <span class="input-group-addon">$</span>
                <input id="valor-total" type="text" name="valor_total" class="form-control"
                       maxlength="45" required="required">
                <span class="input-group-addon">.00</span>
            </div>
        </div>

        <div class="input text required">
            <label for="valor-softex">Valor da Softex</label>
            <div class="input-group m-b-1">
                <span class="input-group-addon">$</span>
                <input id="valor-softex" type="text" name="valor_softex" class="form-control"
                       maxlength="45" required="required">
                <span class="input-group-addon">.00</span>
            </div>
        </div>

        <div class="input text required">
            <label for="valor-restante">Valor Restante</label>
            <div class="input-group m-b-1">
                <span class="input-group-addon">$</span>
                <input id="valor-restante" type="text" name="valor_restante" class="form-control"
                       maxlength="45" required="required">
                <span class="input-group-addon">.00</span>
            </div>
        </div>

        <div class="input text">
            <label for="valor-pago-implementacao">Valor Pago na Implementação</label>
            <div class="input-group m-b-1">
                <span class="input-group-addon">$</span>
                <input id="valor-pago-implementacao" type="text" name="valor_pago_implementacao" class="form-control"
                       maxlength="45" required="required">
                <span class="input-group-addon">.00</span>
            </div>
        </div>

        <div class="input text">
            <label for="valor-pago-avaliacao">Valor Pago na Avaliação</label>
            <div class="input-group m-b-1">
                <span class="input-group-addon">$</span>
                <input id="valor-pago-avaliacao" type="text" name="valor_pago_avaliacao" class="form-control"
                       maxlength="45" required="required">
                <span class="input-group-addon">.00</span>
            </div>
        </div>

        <div class="input text">
            <label for="valor-gasto-total">Valor Gasto (Real)</label>
            <div class="input-group m-b-1">
                <span class="input-group-addon">$</span>
                <input id="valor-gasto-total" type="text" name="valor_gasto_total" class="form-control"
                       maxlength="45" required="required">
                <span class="input-group-addon">.00</span>
            </div>
        </div>

        <?php
        echo $this->Form->input('justificativa_recursos_terceiros',
            [ 'label' => 'Justificativa de Recursos de Terceiros',
                'type' => 'textarea' ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
