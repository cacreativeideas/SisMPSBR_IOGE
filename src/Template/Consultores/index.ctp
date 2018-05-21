<div class="consultores index">
    <h3><?= __('Consultores') ?></h3>
  
    <?=
      $this->Html->link('<span class="fa fa-plus m-r-1" aria-hidden="true"></span>Adicionar Consultor', 
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
                <th><?= $this->Paginator->sort('instituicoes_implementadora.instituicao.nome',
                        'Instituição Implementadora') ?></th>
                <th><?= $this->Paginator->sort('usuario.nome', 'Nome') ?></th>
                <th><?= $this->Paginator->sort('usuario.email', 'Email') ?></th>
                <th><?= $this->Paginator->sort('usuario.telefone', 'Telefone') ?></th>
                <th><?= $this->Paginator->sort('usuario.telefone', 'Coordenador de II') ?></th>
                <th data-field="view" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="edit" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="delete" data-width="60px" data-class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($consultores as $consultor): ?>
            <tr>
                <td><?= $consultor->has('instituicoes_implementadora') ? $this->Html->link(
                        $consultor->instituicoes_implementadora->instituicao->nome,
                        ['controller' => 'InstituicoesImplementadoras', 'action' => 'view',
                            $consultor->instituicoes_implementadora->id]) : '' ?></td>
                <td><?= h($consultor->usuario->nome) ?></td>
                <td><?= h($consultor->usuario->email) ?></td>
                <td><?= h($consultor->usuario->telefone) ?></td>
                <td><?= $consultor->is_coordenador ? "Sim" : "Não" ?></td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-eye'></i>", ['action' => 'view', $consultor->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-pencil'></i>", ['action' => 'edit', $consultor->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Form->postLink("<i class='fa fa-trash'></i>", ['action' => 'delete', $consultor->id],
                        ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Are you sure you want to delete # {0}?',
                            $consultor->usuario->nome)]) ?>
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
