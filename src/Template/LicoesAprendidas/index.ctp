<div class="licoesAprendidas index">
    <h3><?= __('Lições Aprendidas') ?></h3>
  
    <?=
      $this->Html->link('<span class="fa fa-plus m-r-1" aria-hidden="true"></span>Adicionar Lição Aprendida', 
                        ['controller' => 'LicoesAprendidas', 'action' => 'add'], 
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
                <th><?= $this->Paginator->sort('topico_id', 'Tópico') ?></th>
                <th><?= $this->Paginator->sort('licao_aprendida', 'Lição') ?></th>
                <th><?= $this->Paginator->sort('impacto', 'Impacto') ?></th>
                <th><?= $this->Paginator->sort('data_identificacao', 'Data de Identificação') ?></th>
                <th data-field="view" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="edit" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="delete" data-width="60px" data-class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($licoesAprendidas as $licoesAprendida): ?>
            <tr>
                <td><?= h($licoesAprendida->id) ?></td>
                <td><?= $licoesAprendida->has('topico') ? h($licoesAprendida->topico->nome) : '' ?></td>
                <td><?= h($licoesAprendida->licao_aprendida) ?></td>
                <td><?= h($licoesAprendida->impacto) ?></td>
                <td><?= h($licoesAprendida->data_identificacao) ?></td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-eye'></i>", ['action' => 'view', $licoesAprendida->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-pencil'></i>", ['action' => 'edit', $licoesAprendida->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Form->postLink("<i class='fa fa-trash'></i>", ['action' => 'delete', $licoesAprendida->id],
                        ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Are you sure you want to delete # {0}?',
                            $licoesAprendida->id)]) ?>
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
