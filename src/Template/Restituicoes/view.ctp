<div class="restituicoes view">
    <h3><?= h($restituicao->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Pagamento') ?></th>
            <td><?= $restituicao->has('pagamento') ? $this->Html->link($restituicao->pagamento->id, ['controller' => 'Pagamentos', 'action' => 'view', $restituicao->pagamento->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Unidades Organizacional') ?></th>
            <td><?= $restituicao->has('unidades_organizacional') ? $this->Html->link($restituicao->unidades_organizacional->id, ['controller' => 'UnidadesOrganizacionais', 'action' => 'view', $restituicao->unidades_organizacional->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Restituicao') ?></th>
            <td><?= $this->Number->format($restituicao->valor_restituicao) ?></td>
        </tr>
        <tr>
            <th><?= __('Ativo') ?></th>
            <td><?= $this->Number->format($restituicao->ativo) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Pagamento') ?></th>
            <td><?= h($restituicao->data_pagamento) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Notificacao') ?></th>
            <td><?= h($restituicao->data_notificacao) ?></td>
        </tr>
    </table>
</div>
