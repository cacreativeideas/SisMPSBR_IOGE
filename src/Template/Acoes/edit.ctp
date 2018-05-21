<div class="acoes form">
    <?= $this->Form->create($acao) ?>
    <fieldset>
        <legend><?= __('Editar Ação') ?></legend>
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