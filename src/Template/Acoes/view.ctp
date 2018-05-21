<div class="acoes view">
    <h3><?= h($acao->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Data Limite') ?></th>
            <td><?= h($acao->data_limite) ?></td>
        </tr>
        <tr>
            <th><?= __('Situacao') ?></th>
            <td><?= h($acao->situacao) ?></td>
        </tr>
        <tr>
            <th><?= __('Reuniao') ?></th>
            <td><?= $acao->has('reuniao') ? $this->Html->link($acao->reuniao->id, ['controller' => 'Reunioes', 'action' => 'view', $acao->reuniao->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Responsavel') ?></th>
            <td><?= h($acao->responsavel) ?></td>
        </tr>
        <tr>
            <th><?= __('Ativo') ?></th>
            <td><?= $this->Number->format($acao->ativo) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao') ?></h4>
        <?= $this->Text->autoParagraph(h($acao->descricao)); ?>
    </div>
</div>
