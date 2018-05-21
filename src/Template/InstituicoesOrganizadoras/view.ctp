<div class="instituicoesOrganizadoras view">
    <h3><?= h($instituicoesOrganizadora->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Instituicao') ?></th>
            <td><?= $instituicoesOrganizadora->has('instituicao') ? $this->Html->link($instituicoesOrganizadora->instituicao->id, ['controller' => 'Instituicoes', 'action' => 'view', $instituicoesOrganizadora->instituicao->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Ativo') ?></th>
            <td><?= $this->Number->format($instituicoesOrganizadora->ativo) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Empresas') ?></h4>
        <?php if (!empty($instituicoesOrganizadora->empresas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Razao Social') ?></th>
                <th><?= __('Cnpj') ?></th>
                <th><?= __('Nome') ?></th>
                <th><?= __('Endereco') ?></th>
                <th><?= __('Descricao Atividades') ?></th>
                <th><?= __('Porte') ?></th>
                <th><?= __('Logo') ?></th>
                <th><?= __('Website') ?></th>
                <th><?= __('Instituicao Organizadora Id') ?></th>
                <th><?= __('Ativo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($instituicoesOrganizadora->empresas as $empresas): ?>
            <tr>
                <td><?= h($empresas->id) ?></td>
                <td><?= h($empresas->razao_social) ?></td>
                <td><?= h($empresas->cnpj) ?></td>
                <td><?= h($empresas->nome) ?></td>
                <td><?= h($empresas->endereco) ?></td>
                <td><?= h($empresas->descricao_atividades) ?></td>
                <td><?= h($empresas->porte) ?></td>
                <td><?= h($empresas->logo) ?></td>
                <td><?= h($empresas->website) ?></td>
                <td><?= h($empresas->instituicao_organizadora_id) ?></td>
                <td><?= h($empresas->ativo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Empresas', 'action' => 'view', $empresas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Empresas', 'action' => 'edit', $empresas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Empresas', 'action' => 'delete', $empresas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empresas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
