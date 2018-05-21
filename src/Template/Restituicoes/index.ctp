<div class="restituicoes index">
    <h3><?= __('Restituições') ?></h3>

    <?=
    $this->Html->link('<span class="fa fa-plus m-r-1" aria-hidden="true"></span>Adicionar Restituição',
        ['controller' => 'Restituicoes', 'action' => 'add'],
        ['escape'=>false, 'class' => 'btn btn-default m-b-2']);
    ?>

    <table
        data-toggle="table"
        data-classes="table-responsive"
        data-locale="pt-BR"
        cellpadding="0"
        cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('unidade_organizacional_id') ?></th>
                <th><?= $this->Paginator->sort('data_pagamento') ?></th>
                <th><?= $this->Paginator->sort('valor_restituicao') ?></th>
                <th><?= $this->Paginator->sort('data_notificacao') ?></th>
                <th data-field="view" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="edit" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="delete" data-width="60px" data-class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($restituicoes as $restituicao): ?>
            <tr>
                <td><?= $restituicao->has('unidades_organizacional') ? $this->Html->link($restituicao->unidades_organizacional->id, ['controller' => 'UnidadesOrganizacionais', 'action' => 'view', $restituicao->unidades_organizacional->id]) : '' ?></td>
                <td><?= h($restituicao->data_pagamento) ?></td>
                <td><?= $this->Number->format($restituicao->valor_restituicao) ?></td>
                <td><?= h($restituicao->data_notificacao) ?></td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-eye'></i>", ['action' => 'view', $restituicao->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-pencil'></i>", ['action' => 'edit', $restituicao->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Form->postLink("<i class='fa fa-trash'></i>", ['action' => 'delete', $restituicao->id],
                        ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Are you sure you want to delete # {0}?',
                            $pagamento->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
