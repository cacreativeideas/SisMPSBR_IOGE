<div class="licoesAprendidas view">
    <h3><?= h($licoesAprendida->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Data Identificacao') ?></th>
            <td><?= h($licoesAprendida->data_identificacao) ?></td>
        </tr>
        <tr>
            <th><?= __('Projeto') ?></th>
            <td><?= $licoesAprendida->has('projeto') ? $this->Html->link($licoesAprendida->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $licoesAprendida->projeto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Topico') ?></th>
            <td><?= $licoesAprendida->has('topico') ? $this->Html->link($licoesAprendida->topico->id, ['controller' => 'Topicos', 'action' => 'view', $licoesAprendida->topico->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Ativo') ?></th>
            <td><?= $this->Number->format($licoesAprendida->ativo) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Licao Aprendida') ?></h4>
        <?= $this->Text->autoParagraph(h($licoesAprendida->licao_aprendida)); ?>
    </div>
    <div class="row">
        <h4><?= __('Ocorrencia') ?></h4>
        <?= $this->Text->autoParagraph(h($licoesAprendida->ocorrencia)); ?>
    </div>
    <div class="row">
        <h4><?= __('Impacto') ?></h4>
        <?= $this->Text->autoParagraph(h($licoesAprendida->impacto)); ?>
    </div>
    <div class="row">
        <h4><?= __('Influencia') ?></h4>
        <?= $this->Text->autoParagraph(h($licoesAprendida->influencia)); ?>
    </div>
</div>
