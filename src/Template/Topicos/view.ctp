<div class="topicos view">
    <h3><?= h($topico->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($topico->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Ativo') ?></th>
            <td><?= $this->Number->format($topico->ativo) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Licoes Aprendidas') ?></h4>
        <?php if (!empty($topico->licoes_aprendidas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Lição Aprendida') ?></th>
                <th><?= __('Ocorrencia') ?></th>
                <th><?= __('Momento Projeto') ?></th>
                <th><?= __('Impacto') ?></th>
                <th><?= __('Influência') ?></th>
                <th><?= __('Data Identificacao') ?></th>
                <th><?= __('Data Cadastro') ?></th>
                <th><?= __('Projeto Id') ?></th>
                <th><?= __('Ativo') ?></th>
                <th><?= __('Topico Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($topico->licoes_aprendidas as $licoesAprendidas): ?>
            <tr>
                <td><?= h($licoesAprendidas->id) ?></td>
                <td><?= h($licoesAprendidas->licao_aprendida) ?></td>
                <td><?= h($licoesAprendidas->ocorrencia) ?></td>
                <td><?= h($licoesAprendidas->momento_projeto) ?></td>
                <td><?= h($licoesAprendidas->impacto) ?></td>
                <td><?= h($licoesAprendidas->influencia) ?></td>
                <td><?= h($licoesAprendidas->data_identificacao) ?></td>
                <td><?= h($licoesAprendidas->data_cadastro) ?></td>
                <td><?= h($licoesAprendidas->projeto_id) ?></td>
                <td><?= h($licoesAprendidas->ativo) ?></td>
                <td><?= h($licoesAprendidas->topico_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'LicoesAprendidas', 'action' => 'view', $licoesAprendidas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'LicoesAprendidas', 'action' => 'edit', $licoesAprendidas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'LicoesAprendidas', 'action' => 'delete', $licoesAprendidas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $licoesAprendidas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
