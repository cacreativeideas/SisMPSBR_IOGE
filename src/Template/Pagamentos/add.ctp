<div class="pagamentos form">
    <?= $this->Form->create($pagamento) ?>
    <fieldset>
        <legend><?= __('Adicionar Plano de Pagamento') ?></legend>

        <?php
            echo $this->Form->input('projeto_id', [
                'label' => 'Projeto',
                'empty' => 'Selecione',
                'options' => $projetos,
                'required' => 'required'
            ]);
        ?>

        <div class="input text required">
            <label for="valor-implementacao">Valor a ser pago na Implementação</label>
            <div class="input-group m-b-1">
                <span class="input-group-addon">$</span>
                <input id="valor-implementacao" type="text" name="valor_implementacao" class="form-control"
                       maxlength="45" required="required">
                <span class="input-group-addon">,00</span>
            </div>
        </div>

        <div class="input text required">
            <label for="valor-avaliacao">Valor a ser pago na Avaliação</label>
            <div class="input-group m-b-1">
                <span class="input-group-addon">$</span>
                <input id="valor-avaliacao" type="text" name="valor_avaliacao" class="form-control"
                       maxlength="45" required="required">
                <span class="input-group-addon">,00</span>
            </div>
        </div>

        <div class="input text required">
            <label for="valor-total">Valor Total (Implementação + Avaliação)</label>
            <div class="input-group m-b-1">
                <span class="input-group-addon">$</span>
                <input id="valor-total" type="text" name="valor_total" class="form-control" value="0000"
                       maxlength="45" required="required" disabled="disabled">
                <span class="input-group-addon">,00</span>
            </div>
        </div>
        
        <div class="input text required">
            <label for="percentual-softex">Percentual da Softex</label>
            <div class="input-group m-b-1">
                <input id="percentual-softex" type="text" name="percentual_softex" class="form-control"
                       maxlength="45" required="required">
                <span class="input-group-addon">%</span>
            </div>
        </div>
        
        <div class="input text required">
            <label for="valor-softex">Valor a ser pago pela Softex</label>
            <div class="input-group m-b-1">
                <span class="input-group-addon">$</span>
                <input id="valor-softex" type="text" name="valor_softex" class="form-control" value="0000"
                       maxlength="45" required="required" disabled="disabled">
                <span class="input-group-addon">,00</span>
            </div>
        </div>
      
        <div class="input text required">
            <label for="valor-empresa">Valor a ser pago pela Empresa</label>
            <div class="input-group m-b-1">
                <span class="input-group-addon">$</span>
                <input id="valor-empresa" type="text" name="valor_empresa" class="form-control"
                       maxlength="45" required="required">
                <span class="input-group-addon">,00</span>
            </div>
        </div>
      
        <div class="input text required">
            <label for="valor-terceiros">Valor de Outros Financiamentos (Terceiros)</label>
            <div class="input-group m-b-1">
                <span class="input-group-addon">$</span>
                <input id="valor-terceiros" type="text" name="valor_terceiros" class="form-control"
                       maxlength="45" required="required">
                <span class="input-group-addon">,00</span>
            </div>
        </div>
      
        <?php
            echo $this->Form->input('terceiros',
                [ 'label' => 'Financiadores (Quem são)' ]);
      
            echo $this->Form->input('justificativa_recursos_terceiros',
                [ 'label' => 'Justificativa de Recursos de Terceiros',
                  'type' => 'textarea' ]);
      
            echo $this->Form->input('observacoes', ['label' => 'Observações', 'type' => 'textarea']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
