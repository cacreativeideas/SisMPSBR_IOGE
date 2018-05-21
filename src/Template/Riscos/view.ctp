<div class="riscos view">
    <h3><?= h($risco->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Data Acompanhamento') ?></th>
            <td><?= h($risco->data_acompanhamento) ?></td>
        </tr>
        <tr>
            <th><?= __('Situacao') ?></th>
            <td><?= h($risco->situacao) ?></td>
        </tr>
        <tr>
            <th><?= __('Impacto') ?></th>
            <td><?= h($risco->impacto) ?></td>
        </tr>
        <tr>
            <th><?= __('Probabilidade') ?></th>
            <td><?= h($risco->probabilidade) ?></td>
        </tr>
        <tr>
            <th><?= __('Severidade') ?></th>
            <td><?= h($risco->severidade) ?></td>
        </tr>
        <tr>
            <th><?= __('Projeto') ?></th>
            <td><?= $risco->has('projeto') ? $this->Html->link($risco->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $risco->projeto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Consultor') ?></th>
            <td><?= $risco->has('consultor') ? $this->Html->link($risco->consultor->id, ['controller' => 'Consultores', 'action' => 'view', $risco->consultor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Ativo') ?></th>
            <td><?= $this->Number->format($risco->ativo) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao') ?></h4>
        <?= $this->Text->autoParagraph(h($risco->descricao)); ?>
    </div>
    <div class="row">
        <h4><?= __('Acao Prevencao') ?></h4>
        <?= $this->Text->autoParagraph(h($risco->acao_prevencao)); ?>
    </div>
    <div class="row">
        <h4><?= __('Acao Contingencia') ?></h4>
        <?= $this->Text->autoParagraph(h($risco->acao_contingencia)); ?>
    </div>
</div>
