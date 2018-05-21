<div class="unidadesOrganizacionais index">
    <h3><?= __('Unidades Organizacionais') ?></h3>
    
    <?=
      $this->Html->link('<span class="fa fa-plus m-r-1" aria-hidden="true"></span>Adicionar Unidade Organizacional', 
                        ['controller' => 'UnidadesOrganizacionais', 'action' => 'add'], 
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
                <th><?= $this->Paginator->sort('empresa.nome', 'Empresa') ?></th>
                <th><?= $this->Paginator->sort('grupo_empresa.nome', 'Grupo de Empresas') ?></th>
                <th><?= $this->Paginator->sort('nome', 'Nome') ?></th>
                <th><?= $this->Paginator->sort('nivel_mps', 'Nível MPS') ?></th>
                <th><?= $this->Paginator->sort('versao_modelo', 'Versão do Modelo') ?></th>
                <th><?= $this->Paginator->sort('modelo_referencia', 'Modelo de Referência') ?></th>
                <th data-field="view" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="edit" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="delete" data-width="60px" data-class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($unidadesOrganizacionais as $unidadesOrganizacional): ?>
            <tr>
                <td><?= $unidadesOrganizacional->has('empresa') ? $this->Html->link($unidadesOrganizacional->empresa->nome, ['controller' => 'Empresas', 'action' => 'view', $unidadesOrganizacional->empresa->id]) : '' ?></td>
                <td><?= $unidadesOrganizacional->has('grupos_empresa') ? $this->Html->link($unidadesOrganizacional->grupos_empresa->nome, ['controller' => 'GruposEmpresas', 'action' => 'view', $unidadesOrganizacional->grupos_empresa->id]) : '' ?></td>
                <td><?= h($unidadesOrganizacional->nome) ?></td>
                <td><?= h($unidadesOrganizacional->nivel_mps) ?></td>
                <td><?= h($unidadesOrganizacional->versao_modelo) ?></td>
                <td><?= h($unidadesOrganizacional->modelo_referencia) ?></td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-eye'></i>", ['action' => 'view', $unidadesOrganizacional->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-pencil'></i>", ['action' => 'edit', $unidadesOrganizacional->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Form->postLink("<i class='fa fa-trash'></i>", ['action' => 'delete', $unidadesOrganizacional->id],
                        ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Are you sure you want to delete # {0}?',
                            $unidadesOrganizacional->nome)]) ?>
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
