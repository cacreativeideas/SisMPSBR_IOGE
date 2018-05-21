<div class="consultores view">
    <h3><?= h($consultor->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Usuario') ?></th>
            <td><?= $consultor->has('usuario') ? $this->Html->link($consultor->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $consultor->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Instituicoes Implementadora') ?></th>
            <td><?= $consultor->has('instituicoes_implementadora') ? $this->Html->link($consultor->instituicoes_implementadora->id, ['controller' => 'InstituicoesImplementadoras', 'action' => 'view', $consultor->instituicoes_implementadora->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Modelo Referencia') ?></th>
            <td><?= h($consultor->modelo_referencia) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Coordenador') ?></th>
            <td><?= $this->Number->format($consultor->is_coordenador) ?></td>
        </tr>
        <tr>
            <th><?= __('Ativo') ?></th>
            <td><?= $this->Number->format($consultor->ativo) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Riscos') ?></h4>
        <?php if (!empty($consultor->riscos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Descricao') ?></th>
                <th><?= __('Acao Prevencao') ?></th>
                <th><?= __('Acao Contingencia') ?></th>
                <th><?= __('Data Acompanhamento') ?></th>
                <th><?= __('Situacao') ?></th>
                <th><?= __('Impacto') ?></th>
                <th><?= __('Probabilidade') ?></th>
                <th><?= __('Severidade') ?></th>
                <th><?= __('Projeto Id') ?></th>
                <th><?= __('Ativo') ?></th>
                <th><?= __('Consultor Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($consultor->riscos as $riscos): ?>
            <tr>
                <td><?= h($riscos->id) ?></td>
                <td><?= h($riscos->descricao) ?></td>
                <td><?= h($riscos->acao_prevencao) ?></td>
                <td><?= h($riscos->acao_contingencia) ?></td>
                <td><?= h($riscos->data_acompanhamento) ?></td>
                <td><?= h($riscos->situacao) ?></td>
                <td><?= h($riscos->impacto) ?></td>
                <td><?= h($riscos->probabilidade) ?></td>
                <td><?= h($riscos->severidade) ?></td>
                <td><?= h($riscos->projeto_id) ?></td>
                <td><?= h($riscos->ativo) ?></td>
                <td><?= h($riscos->consultor_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Riscos', 'action' => 'view', $riscos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Riscos', 'action' => 'edit', $riscos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Riscos', 'action' => 'delete', $riscos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $riscos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Projetos') ?></h4>
        <?php if (!empty($consultor->projetos)): ?>
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
            <?php foreach ($consultor->projetos as $projetos): ?>
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
