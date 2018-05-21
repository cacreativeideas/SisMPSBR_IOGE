<div class="treinamentos form">
    <?= $this->Form->create($treinamento) ?>
    <fieldset>
        <legend><?= __('Editar Treinamento') ?></legend>
        <?php
        echo $this->Form->input('grupo_empresas_id', [
            'empty' => 'Selecione',
            'required' => 'required',
            'options' => $gruposEmpresas]);

        echo $this->Form->input('nome');
        echo $this->Form->input('descricao', ['label' => 'Descrição']);
        echo $this->Form->input('local');
        echo $this->Form->input('endereco');
        echo $this->Form->input('cidade');
        echo $this->Form->input('estado');

        ?>

        <div class="medium-4 columns">
            <?php
            echo $this->Form->input('data_inicio',
                ['label' => 'Data de Início', 'type' => 'text']);
            ?>
        </div>

        <div class="medium-4 columns">
            <?php
            echo $this->Form->input('data_fim',
                ['label' => 'Data de Fim', 'type' => 'text']);
            ?>
        </div>

        <div class="medium-4 columns">
            <?php
            echo $this->Form->input('total_horas',
                ['label' => 'Total de Horas', 'type' => 'text']);
            ?>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script type="application/javascript">
    $(document).ready(function(){
        $('#data-inicio').datetimepicker({
            format: 'DD/MM/YYYY'
        });

        $('#data-inicio').inputmask({
            mask: '99/99/9999'
        });


        $('#data-fim').datetimepicker({
            format: 'DD/MM/YYYY'
        });

        $('#data-fim').inputmask({
            mask: '99/99/9999'
        });

        $('#total-horas').inputmask({
            mask: '99:99'
        });
    });
</script>