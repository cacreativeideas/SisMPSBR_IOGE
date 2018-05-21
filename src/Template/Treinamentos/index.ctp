<div class="treinamentos index">
    <h3><?= __('Treinamentos') ?></h3>
  
    <?=
      $this->Html->link('<span class="fa fa-plus m-r-1" aria-hidden="true"></span>Adicionar Treinamento', 
                        ['controller' => 'Treinamentos', 'action' => 'add'], 
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
                <th><?= $this->Paginator->sort('grupo_empresas_id', 'Grupos de Empresas') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('data_inicio', 'Data de Início') ?></th>
                <th><?= $this->Paginator->sort('data_fim', 'Data de Fim') ?></th>
                <th data-field="view" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="edit" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="delete" data-width="60px" data-class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($treinamentos as $treinamento): ?>
            <tr>
                <td><?= $treinamento->has('grupos_empresa') ?
                        $this->Html->link($treinamento->grupos_empresa->nome,
                            ['controller' => 'GruposEmpresas',
                                'action' => 'view',
                                $treinamento->grupos_empresa->id]) : '' ?></td>
                <td><?= h($treinamento->nome) ?></td>
                <td><?= h($treinamento->data_inicio) ?></td>
                <td><?= h($treinamento->data_fim) ?></td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-user-plus'></i>", [ 'controller' => 'TreinamentosParticipantes', 'action' => 'add', $treinamento->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-eye'></i>", ['action' => 'view', $treinamento->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-pencil'></i>", ['action' => 'edit', $treinamento->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Form->postLink("<i class='fa fa-trash'></i>", ['action' => 'delete', $treinamento->id],
                        ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Are you sure you want to delete # {0}?',
                            $treinamento->nome)]) ?>
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
