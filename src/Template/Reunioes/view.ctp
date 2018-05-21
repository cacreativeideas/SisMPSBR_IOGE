<div class="reunioes view">
    <h3><?= __('Ata de Reunião') ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Empresa | UO') ?></th>
            <td><?= $reuniao->has('unidades_organizacional') ?
                    $reuniao->unidades_organizacional->empresa->nome . " | " .
                    $reuniao->unidades_organizacional->nome
                    : '' ?>
            </td>
        </tr>
        <tr>
            <th><?= __('Local da Reunião') ?></th>
            <td><?= h($reuniao->local_reuniao) ?></td>
        </tr>
        <tr>
            <th><?= __('Redator') ?></th>
            <td><?= h($reuniao->nome_redator) ?></td>
        </tr>
        <tr>
            <th><?= __('Participante UO') ?></th>
            <td><?= h($reuniao->nome_redator) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Realização') ?></th>
            <td><?= h($reuniao->data_realizacao) ?></td>
        </tr>
        <tr>
            <th><?= __('Hora de Início') ?></th>
            <td><?= h($reuniao->hora_inicio) ?></td>
        </tr>
        <tr>
            <th><?= __('Hora de Encerramento') ?></th>
            <td><?= h($reuniao->hora_fim) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Objetivo') ?></h4>
        <?= $this->Text->autoParagraph(h($reuniao->objetivo)); ?>
    </div>
    <div class="row">
        <h4><?= __('Discussão') ?></h4>
        <?= $this->Text->autoParagraph(h($reuniao->discussao)); ?>
    </div>

    <div class="related m-b-3">
        <h4><?= __('Plano de Ações') ?></h4>

        <?=
        $this->Html->link('<span class="fa fa-plus m-r-1" aria-hidden="true"></span>Adicionar Ação',
            ['controller' => 'Acoes', 'action' => 'add', $reuniao->id ],
            ['escape'=>false, 'class' => 'btn btn-default m-b-2']);
        ?>

        <table
            id="table"
            data-classes="table-responsive"
            data-toggle="table">
            <thead>
                <tr>
                    <th data-field="id" data-visible="false">ID Ação</th>
                    <th data-field="acao"><?= __('Ação') ?></th>
                    <th data-field="acao"><?= __('Responsável') ?></th>
                    <th data-field="acao"><?= __('Data Limite') ?></th>
                    <th data-field="acao"><?= __('Situação') ?></th>
                    <th data-field="view" data-width="60px" data-class="actions"><?= __('') ?></th>
                    <th data-field="edit" data-width="60px" data-class="actions"><?= __('') ?></th>
                    <th data-field="delete" data-width="60px" data-class="actions"><?= __('') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($acoes)): ?>
                <?php foreach ($acoes as $acao): ?>
                    <tr>
                        <td><?= h($acao->id) ?></td>
                        <td><?= h($acao->descricao) ?></td>
                        <td><?= h($acao->responsavel) ?></td>
                        <td><?= h($acao->data_limite) ?></td>
                        <td><?= h($acao->situacao) ?></td>
                        <td class="actions">
                            <?= $this->Html->link("<i class='fa fa-eye'></i>", ['controller' => 'Acoes', 'action' => 'view', $acao->id],
                                ['escape' => false, 'class' => 'btn btn-default']) ?>
                        </td>
                        <td class="actions">
                            <?= $this->Html->link("<i class='fa fa-pencil'></i>", ['controller' => 'Acoes', 'action' => 'edit', $acao->id],
                                ['escape' => false, 'class' => 'btn btn-default']) ?>
                        </td>
                        <td class="actions">
                            <?= $this->Form->postLink("<i class='fa fa-trash'></i>", ['controller' => 'Acoes', 'action' => 'delete', $acao->id],
                                ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Are you sure you want to delete # {0}?',
                                    $reuniao->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

            <?php endif; ?>
            </tbody>
        </table>

    </div>
</div>

<script type="application/javascript">

</script>