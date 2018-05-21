<div class="projetosUos index">
    <h3><?= __('Projetos UOS') ?></h3>
  
    <?=
      $this->Html->link('<span class="fa fa-plus m-r-1" aria-hidden="true"></span>Adicionar Projeto UO', 
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
                <th><?= $this->Paginator->sort('unidades_organizacional.empresa.nome', 'Empresa') ?></th>
                <th><?= $this->Paginator->sort('unidades_organizacional.nome', 'UO') ?></th>
                <th><?= $this->Paginator->sort('descricao', 'Descrição') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th data-field="view" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="edit" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="delete" data-width="60px" data-class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projetosUos as $projetosUo): ?>
            <tr>
                <td><?= $projetosUo->has('unidades_organizacional') ? $this->Html->link($projetosUo->unidades_organizacional->empresa->nome,
                        ['controller' => 'Empresas',
                            'action' => 'edit', $projetosUo->unidades_organizacional->empresa->id]) : '' ?></td>
                <td><?= $projetosUo->has('unidades_organizacional') ? $this->Html->link($projetosUo->unidades_organizacional->nome,
                        ['controller' => 'UnidadesOrganizacionais',
                            'action' => 'edit', $projetosUo->unidades_organizacional->id]) : '' ?></td>
                <td><?= h($projetosUo->descricao) ?></td>
                <td><?= h($projetosUo->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-eye'></i>", ['action' => 'view', $projetosUo->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-pencil'></i>", ['action' => 'edit', $projetosUo->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Form->postLink("<i class='fa fa-trash'></i>", ['action' => 'delete', $projetosUo->id],
                        ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Are you sure you want to delete # {0}?',
                            $projetosUo->id)]) ?>
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
