<div class="instituicoesImplementadoras view">
    <h3><?= h($instituicoesImplementadora->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome Contato') ?></th>
            <td><?= h($instituicoesImplementadora->nome_contato) ?></td>
        </tr>
        <tr>
            <th><?= __('Email Contato') ?></th>
            <td><?= h($instituicoesImplementadora->email_contato) ?></td>
        </tr>
        <tr>
            <th><?= __('Telefone Contato') ?></th>
            <td><?= h($instituicoesImplementadora->telefone_contato) ?></td>
        </tr>
        <tr>
            <th><?= __('Instituicao') ?></th>
            <td><?= $instituicoesImplementadora->has('instituicao') ? $this->Html->link($instituicoesImplementadora->instituicao->id, ['controller' => 'Instituicoes', 'action' => 'view', $instituicoesImplementadora->instituicao->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Modelo Referencia') ?></th>
            <td><?= h($instituicoesImplementadora->modelo_referencia) ?></td>
        </tr>
        <tr>
            <th><?= __('Ativo') ?></th>
            <td><?= $this->Number->format($instituicoesImplementadora->ativo) ?></td>
        </tr>
        <tr>
            <th><?= __('Instituicaoorganizadora Id') ?></th>
            <td><?= $this->Number->format($instituicoesImplementadora->instituicaoorganizadora_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Projetos') ?></h4>
        <?php if (!empty($instituicoesImplementadora->projetos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Data Prevista Marco 100') ?></th>
                <th><?= __('Data Prevista Marco 50') ?></th>
                <th><?= __('Data Prevista Avaliacao') ?></th>
                <th><?= __('Data Assinatura Convenio') ?></th>
                <th><?= __('Data Inicio Implementacao') ?></th>
                <th><?= __('Parecer Ii Cumprimento') ?></th>
                <th><?= __('Parecer Ii Comprometimento') ?></th>
                <th><?= __('Parecer Ii Dificuldades') ?></th>
                <th><?= __('Parecer Ioge Desempenho') ?></th>
                <th><?= __('Parecer Ioge Dificuldades') ?></th>
                <th><?= __('Parecer Ioge Observacoes') ?></th>
                <th><?= __('Data Realizacao Marco 50') ?></th>
                <th><?= __('Data Realizacao Marco 100') ?></th>
                <th><?= __('Data Realizacao Avaliacao') ?></th>
                <th><?= __('Grupo Empresas Id') ?></th>
                <th><?= __('Unidade Organizacional Id') ?></th>
                <th><?= __('Descricao Processo Ii') ?></th>
                <th><?= __('Instituicao Implementadora Id') ?></th>
                <th><?= __('Descricao Processo Ia') ?></th>
                <th><?= __('Instituicao Avaliadora Id') ?></th>
                <th><?= __('Ativo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($instituicoesImplementadora->projetos as $projetos): ?>
            <tr>
                <td><?= h($projetos->id) ?></td>
                <td><?= h($projetos->data_prevista_marco_100) ?></td>
                <td><?= h($projetos->data_prevista_marco_50) ?></td>
                <td><?= h($projetos->data_prevista_avaliacao) ?></td>
                <td><?= h($projetos->data_assinatura_convenio) ?></td>
                <td><?= h($projetos->data_inicio_implementacao) ?></td>
                <td><?= h($projetos->parecer_ii_cumprimento) ?></td>
                <td><?= h($projetos->parecer_ii_comprometimento) ?></td>
                <td><?= h($projetos->parecer_ii_dificuldades) ?></td>
                <td><?= h($projetos->parecer_ioge_desempenho) ?></td>
                <td><?= h($projetos->parecer_ioge_dificuldades) ?></td>
                <td><?= h($projetos->parecer_ioge_observacoes) ?></td>
                <td><?= h($projetos->data_realizacao_marco_50) ?></td>
                <td><?= h($projetos->data_realizacao_marco_100) ?></td>
                <td><?= h($projetos->data_realizacao_avaliacao) ?></td>
                <td><?= h($projetos->grupo_empresas_id) ?></td>
                <td><?= h($projetos->unidade_organizacional_id) ?></td>
                <td><?= h($projetos->descricao_processo_ii) ?></td>
                <td><?= h($projetos->instituicao_implementadora_id) ?></td>
                <td><?= h($projetos->descricao_processo_ia) ?></td>
                <td><?= h($projetos->instituicao_avaliadora_id) ?></td>
                <td><?= h($projetos->ativo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Projetos', 'action' => 'view', $projetos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Projetos', 'action' => 'edit', $projetos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projetos', 'action' => 'delete', $projetos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projetos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
