<div class="treinamentos view">
    <h3><?= h($treinamento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($treinamento->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Grupo de Empresas') ?></th>
            <td><?= $treinamento->has('grupos_empresa') ? $this->Html->link($treinamento->grupos_empresa->nome, ['controller' => 'GruposEmpresas', 'action' => 'view', $treinamento->grupos_empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Preletor') ?></th>
            <td><?= h($treinamento->preletor) ?></td>
        </tr>
        <tr>
            <th><?= __('Local') ?></th>
            <td><?= h($treinamento->local) ?></td>
        </tr>
        <tr>
            <th><?= __('Endereco') ?></th>
            <td><?= h($treinamento->endereco) ?></td>
        </tr>
        <tr>
            <th><?= __('Cidade') ?></th>
            <td><?= h($treinamento->cidade) ?></td>
        </tr>
        <tr>
            <th><?= __('Estado') ?></th>
            <td><?= h($treinamento->estado) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Inicio') ?></th>
            <td><?= h($treinamento->data_inicio) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Encerramento') ?></th>
            <td><?= h($treinamento->data_fim) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Horas') ?></th>
            <td><?= h($treinamento->total_horas) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Ementa') ?></h4>
        <?= $this->Text->autoParagraph(h($treinamento->descricao)); ?>
    </div>
    <div class="related">
        <h4><?= __('Participantes') ?></h4>
        <?php if (!empty($treinamento->treinamentos_participantes)): ?>
            <table
                data-toggle="table"
                data-classes="table-responsive"
                data-locale="pt-BR"
                cellpadding="0"
                cellspacing="0">
                <tr>
                    <th><?= __('Nome Participante') ?></th>
                    <th><?= __('Empresa') ?></th>
                    <th data-field="view" data-width="60px" data-class="actions"><?= __('') ?></th>
                    <th data-field="edit" data-width="60px" data-class="actions"><?= __('') ?></th>
                    <th data-field="delete" data-width="60px" data-class="actions"><?= __('') ?></th>
                </tr>
                <?php foreach ($treinamento->treinamentos_participantes as $treinamentosParticipantes): ?>
                    <tr>
                        <td><?= h($treinamentosParticipantes->nome_participante) ?></td>
                        <td><?= h($treinamentosParticipantes->empresa_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link("<i class='fa fa-certificate'></i>", ['controller' => 'TreinamentosParticipantes', 'action' => 'emitirCertificado', $treinamentosParticipantes->id],
                                ['escape' => false, 'class' => 'btn btn-default']) ?>
                        </td>
                        <td class="actions">
                            <?= $this->Html->link("<i class='fa fa-eye'></i>", ['controller' => 'TreinamentosParticipantes', 'action' => 'view', $treinamentosParticipantes->id],
                                ['escape' => false, 'class' => 'btn btn-default']) ?>
                        </td>
                        <td class="actions">
                            <?= $this->Html->link("<i class='fa fa-pencil'></i>", ['controller' => 'TreinamentosParticipantes', 'action' => 'edit', $treinamentosParticipantes->id],
                                ['escape' => false, 'class' => 'btn btn-default']) ?>
                        </td>
                        <td class="actions">
                            <?= $this->Form->postLink("<i class='fa fa-trash'></i>", ['controller' => 'TreinamentosParticipantes', 'action' => 'delete', $treinamentosParticipantes->id],
                                ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Are you sure you want to delete # {0}?',
                                    $treinamentosParticipantes->nome)]) ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
