<div class="problemas index">
    <h3><?= __('Problemas') ?></h3>
  
    <?=
      $this->Html->link('<span class="fa fa-plus m-r-1" aria-hidden="true"></span>Adicionar Problema', 
                        ['controller' => 'Problemas', 'action' => 'add'], 
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
<!--                <th>--><?//= $this->Paginator->sort('projeto_id') ?><!--</th>-->
                <th><?= $this->Paginator->sort('descricao') ?></th>
                <th><?= $this->Paginator->sort('data_acompanhamento') ?></th>
                <th><?= $this->Paginator->sort('impacto') ?></th>
                <th data-field="view" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="edit" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="delete" data-width="60px" data-class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($problemas as $problema): ?>
            <tr>
                <td><?= h($problema->id) ?></td>
<!--                <td>--><?//= $problema->has('projeto') ? $this->Html->link($problema->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $problema->projeto->id]) : '' ?><!--</td>-->
                <td><?= h($problema->descricao) ?></td>
                <td><?= h($problema->data_acompanhamento) ?></td>
                <td><?= h($problema->impacto) ?></td>

                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-eye'></i>", ['action' => 'view', $problema->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-pencil'></i>", ['action' => 'edit', $problema->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Form->postLink("<i class='fa fa-trash'></i>", ['action' => 'delete', $problema->id],
                        ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Are you sure you want to delete # {0}?',
                            $problema->id)]) ?>
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
