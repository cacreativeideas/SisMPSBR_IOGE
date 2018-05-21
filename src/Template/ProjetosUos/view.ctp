<div class="projetosUos view">
    <h3><?= h($projetosUo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Descricao') ?></th>
            <td><?= h($projetosUo->descricao) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($projetosUo->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Unidades Organizacional') ?></th>
            <td><?= $projetosUo->has('unidades_organizacional') ? $this->Html->link($projetosUo->unidades_organizacional->id, ['controller' => 'UnidadesOrganizacionais', 'action' => 'view', $projetosUo->unidades_organizacional->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Ativo') ?></th>
            <td><?= $this->Number->format($projetosUo->ativo) ?></td>
        </tr>
    </table>
</div>
