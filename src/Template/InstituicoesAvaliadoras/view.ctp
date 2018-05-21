<div class="instituicoesAvaliadoras view">
    <h3><?= h($instituicoesAvaliadora->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome Contato') ?></th>
            <td><?= h($instituicoesAvaliadora->nome_contato) ?></td>
        </tr>
        <tr>
            <th><?= __('Email Contato') ?></th>
            <td><?= h($instituicoesAvaliadora->email_contato) ?></td>
        </tr>
        <tr>
            <th><?= __('Telefone Contato') ?></th>
            <td><?= h($instituicoesAvaliadora->telefone_contato) ?></td>
        </tr>
        <tr>
            <th><?= __('Instituicao') ?></th>
            <td><?= $instituicoesAvaliadora->has('instituicao') ? $this->Html->link($instituicoesAvaliadora->instituicao->id, ['controller' => 'Instituicoes', 'action' => 'view', $instituicoesAvaliadora->instituicao->id]) : '' ?></td>
        </tr>
    </table>
</div>
