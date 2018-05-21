<div class="instituicoes index">
    <h3><?= __('Instituicoes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('razao_social') ?></th>
                <th><?= $this->Paginator->sort('cnpj') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('endereco') ?></th>
                <th><?= $this->Paginator->sort('telefone') ?></th>
                <th><?= $this->Paginator->sort('website') ?></th>
                <th><?= $this->Paginator->sort('logo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($instituicoes as $instituico): ?>
            <tr>
                <td><?= h($instituico->razao_social) ?></td>
                <td><?= h($instituico->cnpj) ?></td>
                <td><?= h($instituico->nome) ?></td>
                <td><?= h($instituico->endereco) ?></td>
                <td><?= h($instituico->telefone) ?></td>
                <td><?= h($instituico->website) ?></td>
                <td><?= h($instituico->logo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $instituico->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $instituico->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $instituico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $instituico->id)]) ?>
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
