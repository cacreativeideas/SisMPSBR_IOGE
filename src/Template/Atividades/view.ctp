<div class="atividades view">
    <h3><?= h($atividade->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Tipo Atividade') ?></th>
            <td><?= h($atividade->tipo_atividade) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Inicio Planejada') ?></th>
            <td><?= h($atividade->data_inicio_planejada) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Inicio Realizada') ?></th>
            <td><?= h($atividade->data_inicio_realizada) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Fim Planejada') ?></th>
            <td><?= h($atividade->data_fim_planejada) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Fim Realizada') ?></th>
            <td><?= h($atividade->data_fim_realizada) ?></td>
        </tr>
        <tr>
            <th><?= __('Situacao') ?></th>
            <td><?= h($atividade->situacao) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Horas') ?></th>
            <td><?= h($atividade->total_horas) ?></td>
        </tr>
        <tr>
            <th><?= __('Projeto') ?></th>
            <td><?= $atividade->has('projeto') ? $this->Html->link($atividade->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $atividade->projeto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Consultor') ?></th>
            <td><?= $atividade->has('consultor') ? $this->Html->link($atividade->consultor->id, ['controller' => 'Consultores', 'action' => 'view', $atividade->consultor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Ativo') ?></th>
            <td><?= $this->Number->format($atividade->ativo) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao') ?></h4>
        <?= $this->Text->autoParagraph(h($atividade->descricao)); ?>
    </div>
</div>
