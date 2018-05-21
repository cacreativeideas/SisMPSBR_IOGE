<div class="problemas view">
    <h3><?= h($problema->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Data Acompanhamento') ?></th>
            <td><?= h($problema->data_acompanhamento) ?></td>
        </tr>
        <tr>
            <th><?= __('Impacto') ?></th>
            <td><?= h($problema->impacto) ?></td>
        </tr>
        <tr>
            <th><?= __('Projeto') ?></th>
            <td><?= $problema->has('projeto') ? $this->Html->link($problema->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $problema->projeto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Ativo') ?></th>
            <td><?= $this->Number->format($problema->ativo) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao') ?></h4>
        <?= $this->Text->autoParagraph(h($problema->descricao)); ?>
    </div>
    <div class="row">
        <h4><?= __('Acao Contingencia') ?></h4>
        <?= $this->Text->autoParagraph(h($problema->acao_contingencia)); ?>
    </div>
</div>
