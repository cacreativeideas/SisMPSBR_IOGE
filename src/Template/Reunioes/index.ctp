<div class="reunioes index">
    <h3><?= __('Reuniões') ?></h3>
  
    <?=
      $this->Html->link('<span class="fa fa-plus m-r-1" aria-hidden="true"></span>Adicionar Ata de Reunião', 
                        ['controller' => 'Reunioes', 'action' => 'add'], 
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
                <th><?= $this->Paginator->sort('unidade_organizacional_id', 'Empresa | UO') ?></th>
                <th><?= $this->Paginator->sort('nome_redator', 'Consultor') ?></th>
                <th><?= $this->Paginator->sort('data_realizacao', 'Data da Reunião') ?></th>
                <th><?= $this->Paginator->sort('hora_inicio', 'Horário de Início') ?></th>
                <th><?= $this->Paginator->sort('local_reuniao', 'Local') ?></th>
                <th data-field="addAcoes" data-width="60px"><?= __('Ações') ?></th>
                <th data-field="view" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="edit" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="delete" data-width="60px" data-class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reunioes as $reuniao): ?>
            <tr>
                <td><?= $reuniao->has('unidades_organizacional') ?
                        $this->Html->link(
                            $reuniao->unidades_organizacional->empresa->nome . " | " .
                            $reuniao->unidades_organizacional->nome,
                            ['controller' => 'UnidadesOrganizacionais', 'action' => 'view',
                                $reuniao->unidades_organizacional->id]) : '' ?>
                </td>
                <td><?= h($reuniao->nome_redator) ?></td>
                <td><?= h($reuniao->data_realizacao) ?></td>
                <td><?= h($reuniao->hora_inicio) ?></td>
                <td><?= h($reuniao->local_reuniao) ?></td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-plus'></i>", ['controller' => 'Acoes', 'action' => 'add', $reuniao->id],
                        ['escape' => false, 'class' => 'btn btn-default addacoes']) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-eye'></i>", ['action' => 'view', $reuniao->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-pencil'></i>", ['action' => 'edit', $reuniao->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Form->postLink("<i class='fa fa-trash'></i>", ['action' => 'delete', $reuniao->id],
                        ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Are you sure you want to delete # {0}?',
                            $reuniao->id)]) ?>
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
