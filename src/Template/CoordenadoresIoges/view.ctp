<div class="coordenadoresIoges view">
    <h3><?= h($coordenadoresIoge->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Instituicoes Organizadora') ?></th>
            <td><?= $coordenadoresIoge->has('instituicoes_organizadora') ? $this->Html->link($coordenadoresIoge->instituicoes_organizadora->id, ['controller' => 'InstituicoesOrganizadoras', 'action' => 'view', $coordenadoresIoge->instituicoes_organizadora->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Usuario') ?></th>
            <td><?= $coordenadoresIoge->has('usuario') ? $this->Html->link($coordenadoresIoge->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $coordenadoresIoge->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Ativo') ?></th>
            <td><?= $this->Number->format($coordenadoresIoge->ativo) ?></td>
        </tr>
    </table>
</div>
