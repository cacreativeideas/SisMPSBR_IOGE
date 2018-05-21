<div class="acoes form">
    <?= $this->Form->create($acao) ?>
    <fieldset>
        <legend><?= __('Adicionar Ação') ?></legend>

        <h5><?= __('Reunião') ?></h5>
        <table class="vertical-table">
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
        </table>

        <?php
        /*
            echo $this->Form->input('grupo_empresas_id', [
                ['label' => 'Grupo de Empresas'],
                'empty' => 'Selecione',
                'options' => $grupoEmpresas]);

            echo $this->Form->input('empresa_id', [
                ['label' => 'Empresa'],
                'empty' => 'Selecione',
                'options' => $empresas]);

            echo $this->Form->input('unidade_organizacional_id', [
                ['label' => 'Unidade Organizacional'],
                'empty' => 'Selecione',
                'options' => $unidadesOrganizacionais]);
        */
            echo $this->Form->input('descricao', ['label' => 'Ação']);
            echo $this->Form->input('responsavel', ['label' => 'Responsável']);
            echo $this->Form->input('data_limite', ['label' => 'Data Limite', 'type' => 'text']);
            echo $this->Form->input('situacao', ['label' => 'Situação',
                'empty' => 'Selecione', 
                'options' => [
                'Aberta' => 'Aberta',
                'Em Andamento' => 'Em Andamento',
                'Fechada' => 'Fechada'
                ]
                ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script type="application/javascript">
    $(document).ready(function(){
        $('#data-limite').datetimepicker({
            format: 'DD/MM/YYYY'
        });

        $('#data-limite').inputmask({
            mask: '99/99/9999'
        });

    });
</script>