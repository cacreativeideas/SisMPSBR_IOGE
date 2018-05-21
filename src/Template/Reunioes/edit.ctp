<div class="reunioes form">
    <?= $this->Form->create($reuniao) ?>
    <fieldset>
        <legend><?= __('Editar Ata de Reunião') ?></legend>
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
        ?>

        <?= $this->Form->input('unidade_organizacional_id', [
            'label' => 'Projeto',
            'empty' => 'Selecione',
            'options' => $projetos,
            'required' => 'required'] ); ?>

        <div class="medium-4 columns">
            <?php
            echo $this->Form->input('data_realizacao', ['label' => 'Data', 'type' => 'text']);
            ?>
        </div>

        <div class="medium-4 columns">
            <?php
            echo $this->Form->input('hora_inicio', ['label' => 'Início', 'type' => 'text']);
            ?>
        </div>

        <div class="medium-4 columns">
            <?php
            echo $this->Form->input('hora_fim', ['label' => 'Término', 'type' => 'text']);
            ?>
        </div>
        <?php
        echo $this->Form->input('local_reuniao', ['label' => 'Local']);
        echo $this->Form->input('nome_redator', ['label' => 'Redator']);
        echo $this->Form->input('nome_participante_uo', ['label' => 'Nome Participante da UO', 'required' => 'required']);
        echo $this->Form->input('objetivo', ['label' => 'Objetivo da Reunião']);
        echo $this->Form->input('discussao', ['label' => 'Principais Pontos Discutidos, Decisões e Observações']);
        //echo $this->Form->input('instituicao_implementadora_id', ['options' => $instituicoesImplementadoras]);
        //echo $this->Form->input('consultor_id', ['options' => $consultores]);

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script type="application/javascript">
    $(document).ready(function(){
        $('#data-realizacao').datetimepicker({
            format: 'DD/MM/YYYY'
        });

        $('#data-realizacao').inputmask({
            mask: '99/99/9999'
        });

        $('#hora-inicio').inputmask({
            mask: '99:99'
        });

        $('#hora-fim').inputmask({
            mask: '99:99'
        });

    });
</script>