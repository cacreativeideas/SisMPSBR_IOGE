<div class="parcelas view">
    <h3><?= h($parcela->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Pagamento') ?></th>
            <td><?= $parcela->has('pagamento') ? $this->Html->link($parcela->pagamento->id, ['controller' => 'Pagamentos', 'action' => 'view', $parcela->pagamento->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Data Pagamento') ?></th>
            <td><?= h($parcela->data_pagamento) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Prevista Pagamento') ?></th>
            <td><?= h($parcela->data_prevista_pagamento) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo Parcela') ?></th>
            <td><?= h($parcela->tipo_parcela) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Parcela') ?></th>
            <td><?= $this->Number->format($parcela->valor_parcela) ?></td>
        </tr>
        <tr>
            <th><?= __('Ativo') ?></th>
            <td><?= $this->Number->format($parcela->ativo) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observacoes') ?></h4>
        <?= $this->Text->autoParagraph(h($parcela->observacoes)); ?>
    </div>
</div>
