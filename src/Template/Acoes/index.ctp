<div class="acoes index">
    <h3><?= __('Plano de Ações') ?></h3>
    
    <?=
      $this->Html->link('<span class="fa fa-plus m-r-1" aria-hidden="true"></span>Adicionar Ação', 
                        ['controller' => 'Acoes', 'action' => 'add'], 
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
                <th><?= $this->Paginator->sort('descricao', 'Ação') ?></th>
                <th><?= $this->Paginator->sort('data_limite', 'Data Limite') ?></th>
                <th><?= $this->Paginator->sort('responsavel', 'Responsável') ?></th>
                <th><?= $this->Paginator->sort('situacao', 'Situação') ?></th>
                <th data-field="view" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="edit" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="delete" data-width="60px" data-class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($acoes as $acao): ?>
            <tr>
                <td><?= h($acao->descricao) ?></td>
                <td><?= h($acao->data_limite) ?></td>
                <td><?= h($acao->responsavel) ?></td>
                <td><?= h($acao->situacao) ?></td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-eye'></i>", ['action' => 'view', $acao->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-pencil'></i>", ['action' => 'edit', $acao->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Form->postLink("<i class='fa fa-trash'></i>", ['action' => 'delete', $acao->id],
                        ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Are you sure you want to delete # {0}?',
                            $acao->id)]) ?>
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
