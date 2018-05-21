<div class="gruposEmpresas view">
    <h3>Grupo de Empresas - <?= h($gruposEmpresa->nome) ?></h3>

    <div class="btn-group m-b-2">
        <button class="btn btn-default dropdown-toggle" type="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa fa-file-pdf-o m-r-1" aria-hidden="true"></span>Gerar <span class="caret m-l-1"></span>
        </button>

        <ul class="dropdown-menu">
            <li><a href="<?= $this->Url->build([
                    "action" => "gerarRelMarco50"
                ]); ?>">Relatório de Marco de 50%</a></li>

            <li><a href="<?= $this->Url->build([
                    "action" => "gerarRelMarco100"
                ]); ?>">Relatório de Marco de 100%</a></li>

            <li><a href="<?= $this->Url->build([
                    "action" => "gerarRelAvalFinal"
                ]); ?>">Relatório de Avaliação</a></li>
        </ul>
    </div>

    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($gruposEmpresa->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Edital Associado') ?></th>
            <td><?= h($gruposEmpresa->edital_associado) ?></td>
        </tr>
        <tr>
            <th><?= __('Descrição das Obrigatoriedades') ?></th>
            <td><?= $this->Text->autoParagraph(h($gruposEmpresa->descricao_obrigatoriedades)); ?></td>
        </tr>
        <tr>
            <th><?= __('Descrição das Penalidades') ?></th>
            <td><?= $this->Text->autoParagraph(h($gruposEmpresa->descricao_penalidades)); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Empresas / Unidades Organizacionais') ?></h4>
        <?php if (!empty($gruposEmpresa->unidades_organizacionais)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Empresa') ?></th>
                <th><?= __('UO') ?></th>
                <th><?= __('Modelo de Referência') ?></th>
                <th><?= __('Versão Modelo') ?></th>
                <th><?= __('Nível MPS') ?></th>
                <th class="actions"><?= __('Ações') ?></th>

            </tr>
            <?php foreach ($gruposEmpresa->unidades_organizacionais as $unidadesOrganizacionais): ?>
            <tr>
                <td><?= h($unidadesOrganizacionais->empresa->nome) ?></td>
                <td><?= h($unidadesOrganizacionais->nome) ?></td>
                <td><?= h($unidadesOrganizacionais->modelo_referencia) ?></td>
                <td><?= h($unidadesOrganizacionais->versao_modelo) ?></td>
                <td><?= h($unidadesOrganizacionais->nivel_mps) ?></td>

               <td class="actions">
                   <?= $this->Form->postLink("<i class='fa fa-trash'></i>", ['action' => 'deleteUoFromGroup',
                       $gruposEmpresa->id, $unidadesOrganizacionais->id],
                   ['escape' => false, 'class' => 'p-a-1', 'confirm' => __('Are you sure you want to unassociate # {0} from group?',
                       $unidadesOrganizacionais->nome)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>

    <div class="related">
        <h4><?= __('Instituições Implementadoras') ?></h4>
        <?php if (!empty($intituicoesImplementadoras)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th><?= __('Nome') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>

                </tr>
                <?php foreach ($intituicoesImplementadoras as $ii): ?>
                    <tr>
                        <td><?= h($ii->instituicao->nome) ?></td>

                        <td class="actions">
                            <?= $this->Form->postLink("<i class='fa fa-trash'></i>", ['action' => 'deleteIiFromGroup',
                                $gruposEmpresa->id, $ii->id],
                                ['escape' => false, 'class' => 'p-a-1', 'confirm' => __('Are you sure you want to unassociate # {0} from group?',
                                    $ii->instituicao->nome)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>

    <div class="related">
        <h4><?= __('Instituições Avaliadoras') ?></h4>
        <?php if (!empty($instituicoesAvaliadoras)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th><?= __('Nome') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>

                </tr>
                <?php foreach ($instituicoesAvaliadoras as $ia): ?>
                    <tr>
                        <td><?= h($ia->instituicao->nome) ?></td>

                        <td class="actions">
                            <?= $this->Form->postLink("<i class='fa fa-trash'></i>", ['action' => 'deleteIaFromGroup',
                                $gruposEmpresa->id, $ia->id],
                                ['escape' => false, 'class' => 'p-a-1', 'confirm' => __('Are you sure you want to unassociate # {0} from group?',
                                    $ia->instituicao->nome)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
