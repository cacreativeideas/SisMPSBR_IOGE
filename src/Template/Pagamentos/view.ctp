<div class="pagamentos view">
    <h3><?= h($pagamento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Justificativa Recursos Terceiros') ?></th>
            <td><?= h($pagamento->justificativa_recursos_terceiros) ?></td>
        </tr>
        <tr>
            <th><?= __('Projeto') ?></th>
            <td><?= $pagamento->has('projeto') ? $this->Html->link($pagamento->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $pagamento->projeto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Implementacao') ?></th>
            <td><?= $this->Number->format($pagamento->valor_implementacao) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Avaliacao') ?></th>
            <td><?= $this->Number->format($pagamento->valor_avaliacao) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Total') ?></th>
            <td><?= $this->Number->format($pagamento->valor_total) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Softex') ?></th>
            <td><?= $this->Number->format($pagamento->valor_softex) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Restante') ?></th>
            <td><?= $this->Number->format($pagamento->valor_restante) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Pago Implementacao') ?></th>
            <td><?= $this->Number->format($pagamento->valor_pago_implementacao) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Pago Avaliacao') ?></th>
            <td><?= $this->Number->format($pagamento->valor_pago_avaliacao) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Gasto Total') ?></th>
            <td><?= $this->Number->format($pagamento->valor_gasto_total) ?></td>
        </tr>
        <tr>
            <th><?= __('Ativo') ?></th>
            <td><?= $this->Number->format($pagamento->ativo) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Parcelas') ?></h4>
        <?php if (!empty($pagamento->parcelas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Pagamento Id') ?></th>
                <th><?= __('Data Pagamento') ?></th>
                <th><?= __('Valor Parcela') ?></th>
                <th><?= __('Data Prevista Pagamento') ?></th>
                <th><?= __('Ativo') ?></th>
                <th><?= __('Tipo Parcela') ?></th>
                <th><?= __('Observacoes') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pagamento->parcelas as $parcelas): ?>
            <tr>
                <td><?= h($parcelas->id) ?></td>
                <td><?= h($parcelas->pagamento_id) ?></td>
                <td><?= h($parcelas->data_pagamento) ?></td>
                <td><?= h($parcelas->valor_parcela) ?></td>
                <td><?= h($parcelas->data_prevista_pagamento) ?></td>
                <td><?= h($parcelas->ativo) ?></td>
                <td><?= h($parcelas->tipo_parcela) ?></td>
                <td><?= h($parcelas->observacoes) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Parcelas', 'action' => 'view', $parcelas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Parcelas', 'action' => 'edit', $parcelas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Parcelas', 'action' => 'delete', $parcelas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parcelas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Restituicoes') ?></h4>
        <?php if (!empty($pagamento->restituicoes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Pagamento Id') ?></th>
                <th><?= __('Unidade Organizacional Id') ?></th>
                <th><?= __('Data Pagamento') ?></th>
                <th><?= __('Valor Restituicao') ?></th>
                <th><?= __('Data Notificacao') ?></th>
                <th><?= __('Ativo') ?></th>
                <th><?= __('Observacoes') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pagamento->restituicoes as $restituicoes): ?>
            <tr>
                <td><?= h($restituicoes->id) ?></td>
                <td><?= h($restituicoes->pagamento_id) ?></td>
                <td><?= h($restituicoes->unidade_organizacional_id) ?></td>
                <td><?= h($restituicoes->data_pagamento) ?></td>
                <td><?= h($restituicoes->valor_restituicao) ?></td>
                <td><?= h($restituicoes->data_notificacao) ?></td>
                <td><?= h($restituicoes->ativo) ?></td>
                <td><?= h($restituicoes->observacoes) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Restituicoes', 'action' => 'view', $restituicoes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Restituicoes', 'action' => 'edit', $restituicoes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Restituicoes', 'action' => 'delete', $restituicoes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $restituicoes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
