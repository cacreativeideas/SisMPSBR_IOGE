<div class="unidadesOrganizacionais view">
    <h3><?= h($unidadesOrganizacional->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($unidadesOrganizacional->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Descricao Atividades') ?></th>
            <td><?= h($unidadesOrganizacional->descricao_atividades) ?></td>
        </tr>
        <tr>
            <th><?= __('Nivel Mps') ?></th>
            <td><?= h($unidadesOrganizacional->nivel_mps) ?></td>
        </tr>
        <tr>
            <th><?= __('Empresa') ?></th>
            <td><?= $unidadesOrganizacional->has('empresa') ? $this->Html->link($unidadesOrganizacional->empresa->id, ['controller' => 'Empresas', 'action' => 'view', $unidadesOrganizacional->empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Grupos Empresa') ?></th>
            <td><?= $unidadesOrganizacional->has('grupos_empresa') ? $this->Html->link($unidadesOrganizacional->grupos_empresa->id, ['controller' => 'GruposEmpresas', 'action' => 'view', $unidadesOrganizacional->grupos_empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Versao Modelo') ?></th>
            <td><?= h($unidadesOrganizacional->versao_modelo) ?></td>
        </tr>
        <tr>
            <th><?= __('Modelo Referencia') ?></th>
            <td><?= h($unidadesOrganizacional->modelo_referencia) ?></td>
        </tr>
    </table>
</div>
