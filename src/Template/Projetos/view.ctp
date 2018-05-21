<div class="projetos view">
    <h3><?= h($projeto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Grupos Empresa') ?></th>
            <td><?= $projeto->has('grupos_empresa') ? $this->Html->link($projeto->grupos_empresa->id, ['controller' => 'GruposEmpresas', 'action' => 'view', $projeto->grupos_empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Unidades Organizacional') ?></th>
            <td><?= $projeto->has('unidades_organizacional') ? $this->Html->link($projeto->unidades_organizacional->id, ['controller' => 'UnidadesOrganizacionais', 'action' => 'view', $projeto->unidades_organizacional->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Instituicoes Implementadora') ?></th>
            <td><?= $projeto->has('instituicoes_implementadora') ? $this->Html->link($projeto->instituicoes_implementadora->id, ['controller' => 'InstituicoesImplementadoras', 'action' => 'view', $projeto->instituicoes_implementadora->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Instituicoes Avaliadora') ?></th>
            <td><?= $projeto->has('instituicoes_avaliadora') ? $this->Html->link($projeto->instituicoes_avaliadora->id, ['controller' => 'InstituicoesAvaliadoras', 'action' => 'view', $projeto->instituicoes_avaliadora->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Ativo') ?></th>
            <td><?= $this->Number->format($projeto->ativo) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Prevista Marco 100') ?></th>
            <td><?= h($projeto->data_prevista_marco_100) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Prevista Marco 50') ?></th>
            <td><?= h($projeto->data_prevista_marco_50) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Prevista Avaliacao') ?></th>
            <td><?= h($projeto->data_prevista_avaliacao) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Assinatura Convenio') ?></th>
            <td><?= h($projeto->data_assinatura_convenio) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Inicio Implementacao') ?></th>
            <td><?= h($projeto->data_inicio_implementacao) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Realizacao Marco 50') ?></th>
            <td><?= h($projeto->data_realizacao_marco_50) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Realizacao Marco 100') ?></th>
            <td><?= h($projeto->data_realizacao_marco_100) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Realizacao Avaliacao') ?></th>
            <td><?= h($projeto->data_realizacao_avaliacao) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Parecer Ii Cumprimento') ?></h4>
        <?= $this->Text->autoParagraph(h($projeto->parecer_ii_cumprimento)); ?>
    </div>
    <div class="row">
        <h4><?= __('Parecer Ii Comprometimento') ?></h4>
        <?= $this->Text->autoParagraph(h($projeto->parecer_ii_comprometimento)); ?>
    </div>
    <div class="row">
        <h4><?= __('Parecer Ii Dificuldades') ?></h4>
        <?= $this->Text->autoParagraph(h($projeto->parecer_ii_dificuldades)); ?>
    </div>
    <div class="row">
        <h4><?= __('Parecer Ioge Desempenho') ?></h4>
        <?= $this->Text->autoParagraph(h($projeto->parecer_ioge_desempenho)); ?>
    </div>
    <div class="row">
        <h4><?= __('Parecer Ioge Dificuldades') ?></h4>
        <?= $this->Text->autoParagraph(h($projeto->parecer_ioge_dificuldades)); ?>
    </div>
    <div class="row">
        <h4><?= __('Parecer Ioge Observacoes') ?></h4>
        <?= $this->Text->autoParagraph(h($projeto->parecer_ioge_observacoes)); ?>
    </div>
    <div class="row">
        <h4><?= __('Descricao Processo Ii') ?></h4>
        <?= $this->Text->autoParagraph(h($projeto->descricao_processo_ii)); ?>
    </div>
    <div class="row">
        <h4><?= __('Descricao Processo Ia') ?></h4>
        <?= $this->Text->autoParagraph(h($projeto->descricao_processo_ia)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Atividades') ?></h4>
        <?php if (!empty($projeto->atividades)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Descricao') ?></th>
                <th><?= __('Tipo Atividade') ?></th>
                <th><?= __('Data Inicio Planejada') ?></th>
                <th><?= __('Data Inicio Realizada') ?></th>
                <th><?= __('Data Fim Planejada') ?></th>
                <th><?= __('Data Fim Realizada') ?></th>
                <th><?= __('Situacao') ?></th>
                <th><?= __('Total Horas') ?></th>
                <th><?= __('Projeto Id') ?></th>
                <th><?= __('Consultor Planejado Id') ?></th>
                <th><?= __('Consultor Realizado Id') ?></th>
                <th><?= __('Ativo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($projeto->atividades as $atividades): ?>
            <tr>
                <td><?= h($atividades->id) ?></td>
                <td><?= h($atividades->descricao) ?></td>
                <td><?= h($atividades->tipo_atividade) ?></td>
                <td><?= h($atividades->data_inicio_planejada) ?></td>
                <td><?= h($atividades->data_inicio_realizada) ?></td>
                <td><?= h($atividades->data_fim_planejada) ?></td>
                <td><?= h($atividades->data_fim_realizada) ?></td>
                <td><?= h($atividades->situacao) ?></td>
                <td><?= h($atividades->total_horas) ?></td>
                <td><?= h($atividades->projeto_id) ?></td>
                <td><?= h($atividades->consultor_planejado_id) ?></td>
                <td><?= h($atividades->consultor_realizado_id) ?></td>
                <td><?= h($atividades->ativo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Atividades', 'action' => 'view', $atividades->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Atividades', 'action' => 'edit', $atividades->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Atividades', 'action' => 'delete', $atividades->id], ['confirm' => __('Are you sure you want to delete # {0}?', $atividades->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Licoes Aprendidas') ?></h4>
        <?php if (!empty($projeto->licoes_aprendidas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Licao Aprendida') ?></th>
                <th><?= __('Ocorrencia') ?></th>
                <th><?= __('Impacto') ?></th>
                <th><?= __('Influencia') ?></th>
                <th><?= __('Data Identificacao') ?></th>
                <th><?= __('Projeto Id') ?></th>
                <th><?= __('Ativo') ?></th>
                <th><?= __('Topico Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($projeto->licoes_aprendidas as $licoesAprendidas): ?>
            <tr>
                <td><?= h($licoesAprendidas->id) ?></td>
                <td><?= h($licoesAprendidas->licao_aprendida) ?></td>
                <td><?= h($licoesAprendidas->ocorrencia) ?></td>
                <td><?= h($licoesAprendidas->impacto) ?></td>
                <td><?= h($licoesAprendidas->influencia) ?></td>
                <td><?= h($licoesAprendidas->data_identificacao) ?></td>
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
    <div class="related">
        <h4><?= __('Related Pagamentos') ?></h4>
        <?php if (!empty($projeto->pagamentos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Valor Implementacao') ?></th>
                <th><?= __('Valor Avaliacao') ?></th>
                <th><?= __('Valor Total') ?></th>
                <th><?= __('Valor Softex') ?></th>
                <th><?= __('Valor Restante') ?></th>
                <th><?= __('Valor Pago Implementacao') ?></th>
                <th><?= __('Valor Pago Avaliacao') ?></th>
                <th><?= __('Valor Gasto Total') ?></th>
                <th><?= __('Justificativa Recursos Terceiros') ?></th>
                <th><?= __('Projeto Id') ?></th>
                <th><?= __('Ativo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($projeto->pagamentos as $pagamentos): ?>
            <tr>
                <td><?= h($pagamentos->id) ?></td>
                <td><?= h($pagamentos->valor_implementacao) ?></td>
                <td><?= h($pagamentos->valor_avaliacao) ?></td>
                <td><?= h($pagamentos->valor_total) ?></td>
                <td><?= h($pagamentos->valor_softex) ?></td>
                <td><?= h($pagamentos->valor_restante) ?></td>
                <td><?= h($pagamentos->valor_pago_implementacao) ?></td>
                <td><?= h($pagamentos->valor_pago_avaliacao) ?></td>
                <td><?= h($pagamentos->valor_gasto_total) ?></td>
                <td><?= h($pagamentos->justificativa_recursos_terceiros) ?></td>
                <td><?= h($pagamentos->projeto_id) ?></td>
                <td><?= h($pagamentos->ativo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pagamentos', 'action' => 'view', $pagamentos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pagamentos', 'action' => 'edit', $pagamentos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pagamentos', 'action' => 'delete', $pagamentos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagamentos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Problemas') ?></h4>
        <?php if (!empty($projeto->problemas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Descricao') ?></th>
                <th><?= __('Data Acompanhamento') ?></th>
                <th><?= __('Acao Contingencia') ?></th>
                <th><?= __('Impacto') ?></th>
                <th><?= __('Projeto Id') ?></th>
                <th><?= __('Ativo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($projeto->problemas as $problemas): ?>
            <tr>
                <td><?= h($problemas->id) ?></td>
                <td><?= h($problemas->descricao) ?></td>
                <td><?= h($problemas->data_acompanhamento) ?></td>
                <td><?= h($problemas->acao_contingencia) ?></td>
                <td><?= h($problemas->impacto) ?></td>
                <td><?= h($problemas->projeto_id) ?></td>
                <td><?= h($problemas->ativo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Problemas', 'action' => 'view', $problemas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Problemas', 'action' => 'edit', $problemas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Problemas', 'action' => 'delete', $problemas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $problemas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Riscos') ?></h4>
        <?php if (!empty($projeto->riscos)): ?>
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
            <?php foreach ($projeto->riscos as $riscos): ?>
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
        <h4><?= __('Related Consultores') ?></h4>
        <?php if (!empty($projeto->consultores)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Is Coordenador') ?></th>
                <th><?= __('Usuario Id') ?></th>
                <th><?= __('Instituicao Implementadora Id') ?></th>
                <th><?= __('Modelo Referencia') ?></th>
                <th><?= __('Ativo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($projeto->consultores as $consultores): ?>
            <tr>
                <td><?= h($consultores->id) ?></td>
                <td><?= h($consultores->is_coordenador) ?></td>
                <td><?= h($consultores->usuario_id) ?></td>
                <td><?= h($consultores->instituicao_implementadora_id) ?></td>
                <td><?= h($consultores->modelo_referencia) ?></td>
                <td><?= h($consultores->ativo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Consultores', 'action' => 'view', $consultores->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Consultores', 'action' => 'edit', $consultores->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Consultores', 'action' => 'delete', $consultores->id], ['confirm' => __('Are you sure you want to delete # {0}?', $consultores->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
