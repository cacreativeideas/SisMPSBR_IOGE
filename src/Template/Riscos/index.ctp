<div class="riscos index">
    <h3><?= __('Riscos') ?></h3>
      
    <?=
      $this->Html->link('<span class="fa fa-plus m-r-1" aria-hidden="true"></span>Adicionar Risco',
                        ['controller' => 'Riscos', 'action' => 'add'],
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
                <th><?= $this->Paginator->sort('id') ?></th>
<!--                <th>--><?//= $this->Paginator->sort('projeto_id', 'Projeto') ?><!--</th>-->
                <th><?= $this->Paginator->sort('descricao') ?></th>
                <th><?= $this->Paginator->sort('data_acompanhamento') ?></th>
                <th><?= $this->Paginator->sort('situacao', 'Situação') ?></th>
                <th><?= $this->Paginator->sort('impacto', 'Impacto') ?></th>
                <th><?= $this->Paginator->sort('probabilidade', 'Probabilidade') ?></th>
                <th><?= $this->Paginator->sort('severidade', 'Severidade') ?></th>
                <th data-field="view" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="edit" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="delete" data-width="60px" data-class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($riscos as $risco): ?>
            <tr>
                <td><?= h($risco->id) ?></td>
<!--                <td>--><?//= $risco->has('projeto') ? $this->Html->link($risco->projeto->nome, ['controller' => 'Projetos', 'action' => 'view', $risco->projeto->id]) : '' ?><!--</td>-->
                <td><?= h($risco->descricao) ?></td>
                <td><?= h($risco->data_acompanhamento) ?></td>
                <td><?= h($risco->situacao) ?></td>
                <td><?= h($risco->impacto) ?></td>
                <td><?= h($risco->probabilidade) ?></td>
                <td><?= h($risco->severidade) ?></td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-eye'></i>", ['action' => 'view', $risco->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-pencil'></i>", ['action' => 'edit', $risco->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Form->postLink("<i class='fa fa-trash'></i>", ['action' => 'delete', $risco->id],
                        ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Are you sure you want to delete # {0}?',
                            $risco->id)]) ?>
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
