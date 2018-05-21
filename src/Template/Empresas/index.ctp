<div class="empresas index">
    <h3><?= __('Empresas') ?></h3>

    <?=
    $this->Html->link('<span class="fa fa-plus m-r-1" aria-hidden="true"></span>Adicionar Empresa',
        ['action' => 'add'],
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
            <th><?= $this->Paginator->sort('nome') ?></th>
            <th><?= $this->Paginator->sort('porte') ?></th>
            <th><?= $this->Paginator->sort('website') ?></th>
            <th data-field="view" data-width="60px" data-class="actions"><?= __('') ?></th>
            <th data-field="edit" data-width="60px" data-class="actions"><?= __('') ?></th>
            <th data-field="delete" data-width="60px" data-class="actions"><?= __('') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($empresas as $empresa): ?>
            <tr>
                <td><?= h($empresa->nome) ?></td>
                <td><?= h($empresa->porte) ?></td>
                <td><?= h($empresa->website) ?></td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-eye'></i>", ['action' => 'view', $empresa->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-pencil'></i>", ['action' => 'edit', $empresa->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Form->postLink("<i class='fa fa-trash'></i>", ['action' => 'delete', $empresa->id],
                        ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Are you sure you want to delete # {0}?',
                            $empresa->nome)]) ?>
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
