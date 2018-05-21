<div class="treinamentosParticipantes view">
    <h3><?= h($treinamentosParticipantes->id) ?></h3>
    <table class="">
        <tr>
            <th><?= __('Instituicao') ?></th>
            <td><?= $instituicoesOrganizadora->has('instituicao') ? $this->Html->link($instituicoesOrganizadora->instituicao->id, ['controller' => 'Instituicoes', 'action' => 'view', $instituicoesOrganizadora->instituicao->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Ativo') ?></th>
            <td><?= $this->Number->format($instituicoesOrganizadora->ativo) ?></td>
        </tr>
    </table>
</div>
