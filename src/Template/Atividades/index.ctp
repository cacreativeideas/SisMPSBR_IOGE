<div class="atividades index">
    <h3><?= __('Atividades') ?></h3>
  
    <?=
      $this->Html->link('<span class="fa fa-plus m-r-1" aria-hidden="true"></span>Adicionar Atividade', 
                        ['controller' => 'Atividades', 'action' => 'add'], 
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
                <th><?= $this->Paginator->sort('projeto_id', 'Empresa | UO') ?></th>
                <th><?= $this->Paginator->sort('descricao', 'Descrição') ?></th>
                <th><?= $this->Paginator->sort('tipo_atividade', 'Tipo') ?></th>
                <th><?= $this->Paginator->sort('situacao', 'Situação') ?></th>
                <th data-field="view" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="edit" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="delete" data-width="60px" data-class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($atividades as $atividade): ?>
            <tr>
                <td><?= $atividade->has('projeto') ?
                        $this->Html->link(
                            $atividade->projeto->unidades_organizacional->empresa->nome . " " .
                            $atividade->projeto->unidades_organizacional->nome,
                            ['controller' => 'Projetos',
                            'action' => 'view',
                            $atividade->projeto->id]) : '' ?>
                </td>
                <td><?= h($atividade->descricao) ?></td>
                <td><?= h($atividade->tipo_atividade) ?></td>
                <td><?= h($atividade->situacao) ?></td>
                <td><?= $this->Number->format($atividade->consultor_planejado_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-eye'></i>", ['action' => 'view', $atividade->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-pencil'></i>", ['action' => 'edit', $atividade->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Form->postLink("<i class='fa fa-trash'></i>", ['action' => 'delete', $atividade->id],
                        ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Are you sure you want to delete # {0}?',
                            $atividade->id)]) ?>
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
