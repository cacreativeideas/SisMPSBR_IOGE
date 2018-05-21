<div class="coordenadoresIoges index">
    <h3><?= __('Coordenadores IOGEs') ?></h3>
  
    <?=
      $this->Html->link('<span class="fa fa-plus m-r-1" aria-hidden="true"></span>Adicionar Coordenador', 
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
                <th><?= $this->Paginator->sort('instituicoes_organizadora.instituicao.nome', 'IOGE') ?></th>
                <th><?= $this->Paginator->sort('usuario.nome', 'Nome') ?></th>
                <th><?= $this->Paginator->sort('usuario.email', 'Email') ?></th>
                <th><?= $this->Paginator->sort('usuario.telefone', 'Telefone') ?></th>
                <th data-field="view" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="edit" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="delete" data-width="60px" data-class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($coordenadoresIoges as $coordenadoresIoge): ?>
            <tr>
                <td><?= $coordenadoresIoge->has('instituicoes_organizadora') ?
                        $this->Html->link($coordenadoresIoge->instituicoes_organizadora->instituicao->nome,
                            ['controller' => 'InstituicoesOrganizadoras',
                                'action' => 'view',
                                $coordenadoresIoge->instituicoes_organizadora->id]) : '' ?>
                </td>
                <td><?= h($coordenadoresIoge->usuario->nome) ?></td>
                <td><?= h($coordenadoresIoge->usuario->email) ?></td>
                <td><?= h($coordenadoresIoge->usuario->telefone) ?></td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-eye'></i>", ['action' => 'view', $coordenadoresIoge->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-pencil'></i>", ['action' => 'edit', $coordenadoresIoge->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Form->postLink("<i class='fa fa-trash'></i>", ['action' => 'delete', $coordenadoresIoge->id],
                        ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Are you sure you want to delete # {0}?',
                            $coordenadoresIoge->usuario->nome)]) ?>
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
