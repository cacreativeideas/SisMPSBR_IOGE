<div class="projetos index">
    <h3><?= __('Projetos de Implementação') ?></h3>
    
    <?=
      $this->Html->link('<span class="fa fa-plus m-r-1" aria-hidden="true"></span>Adicionar Projeto de Implementação',
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
            <th><?= $this->Paginator->sort('nome', 'Grupo de Empresas') ?></th>
            <th><?= $this->Paginator->sort('edital_associado') ?></th>
            <th data-field="view" data-width="60px" data-class="actions"><?= __('') ?></th>
            <th data-field="edit" data-width="60px" data-class="actions"><?= __('') ?></th>
            <th data-field="delete" data-width="60px" data-class="actions"><?= __('') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($gruposEmpresas as $gruposEmpresa): ?>
            <tr>
                <td><?= h($gruposEmpresa->nome) ?></td>
                <td><?= h($gruposEmpresa->edital_associado) ?></td>

                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-eye'></i>", ['action' => 'view', $gruposEmpresa->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-pencil'></i>", ['action' => 'edit', $gruposEmpresa->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Form->postLink("<i class='fa fa-trash'></i>", ['action' => 'delete', $gruposEmpresa->id],
                        ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Are you sure you want to delete # {0}?',
                            $gruposEmpresa->nome)]) ?>
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
