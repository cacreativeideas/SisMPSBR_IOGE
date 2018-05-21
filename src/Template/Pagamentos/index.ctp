<div class="pagamentos index">
    <h3><?= __('Planos de Pagamentos de Projetos de Implementação') ?></h3>
    
    <?=
      $this->Html->link('<span class="fa fa-plus m-r-1" aria-hidden="true"></span>Adicionar Pagamento',
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
                <th data-field="projeto"><?= $this->Paginator->sort('projeto_id') ?></th>
                <th data-field="valorImplementacao"><?= $this->Paginator->sort('valor_implementacao') ?></th>
                <th data-field="valorAvaliacao"><?= $this->Paginator->sort('valor_avaliacao') ?></th>
                <th data-field="valorTotal"><?= $this->Paginator->sort('valor_total') ?></th>
                <th data-field="valorSoftex"><?= $this->Paginator->sort('valor_softex') ?></th>
                <th data-field="valorRestante"><?= $this->Paginator->sort('valor_restante') ?></th>
                
                <th data-field="view" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="edit" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="delete" data-width="60px" data-class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pagamentos as $pagamento): ?>
            <tr>
                <td><?= $pagamento->has('projeto') ? $this->Html->link($pagamento->projeto->id,
                        ['controller' => 'Projetos', 'action' => 'view', $pagamento->projeto->id]) : '' ?></td>
                <td><?= $this->Number->format($pagamento->valor_implementacao) ?></td>
                <td><?= $this->Number->format($pagamento->valor_avaliacao) ?></td>
                <td><?= $this->Number->format($pagamento->valor_total) ?></td>
                <td><?= $this->Number->format($pagamento->valor_softex) ?></td>
                <td><?= $this->Number->format($pagamento->valor_restante) ?></td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-eye'></i>", ['action' => 'view', $pagamento->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-pencil'></i>", ['action' => 'edit', $pagamento->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Form->postLink("<i class='fa fa-trash'></i>", ['action' => 'delete', $pagamento->id],
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