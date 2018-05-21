<div class="projetos form">
    <?= $this->Form->create($projeto) ?>
    <fieldset>
        <legend><?= __('Adicionar Parecer da II') ?></legend>
        <?php
            echo "<div class='input select required'>";
            echo $this->Form->label('grupo_empresas_id', 'Grupo de Empresas');
            echo $this->Form->select('grupo_empresas_id', $gruposEmpresas, ['required' => true, 'empty' => 'Selecione Grupo de Empresas']);
            echo "</div>";

            echo "<div class='input select required'>";
            echo $this->Form->label('unidade_organizacional_id', 'Unidade Organizacional');
            echo $this->Form->select('unidade_organizacional_id', $uos, ['required' => true, 'empty' => 'Selecione Unidade Organizacional']);
            echo "</div>";

            echo $this->Form->input('parecer_ii_cumprimento', ['label'=> 'Cumprimento do Cronograma de Implementação', 'required' => true]);
            echo $this->Form->input('parecer_ii_comprometimento', ['label'=> 'Comprometimento da Empresa com a Implementação', 'required' => true]);
            echo $this->Form->input('parecer_ii_dificuldades', ['label'=> 'Dificuldades Encontradas na Implementação', 'required' => true]);

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script type="application/javascript">
    $(function() {

        $("[name='grupo_empresas_id']").change(function(){
            var selectedValue = $(this).val();
            $.ajax({
                url:"<?php echo $this->Url->build(array('action'=>'listuobygrupoempresas')); ?>/"+selectedValue,
                dataType:'json',
                type: 'POST',
                'success': function(data) {
                    var html="<option value=''>Selecione Unidade Organizacional</option>";

                    $.each(data['uos'], function(i, item) {
                        html += '<option value="'+i+'">'+item+'</option>';
                    })

                    $("[name='unidade_organizacional_id']").html(html);
                }
            });
        });

    });
</script>
