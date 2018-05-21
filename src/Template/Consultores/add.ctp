<div class="consultores form">
    <?= $this->Form->create($consultor) ?>
    <fieldset>
        <legend><?= __('Adicionar Consultor') ?></legend>
        <?php
            echo $this->Form->input('instituicao_implementadora_id', ['empty' => 'Selecione', 'options' => $instituicoesImplementadoras,
                'required'=>'required']);
            echo $this->Form->input('usuario.id');
            echo $this->Form->input('usuario.nome', ['label' => 'Nome']);
            echo $this->Form->input('usuario.email', ['label' => 'E-mail']);
            echo $this->Form->input('usuario.endereco', ['label' => 'Endereço']);
            echo $this->Form->input('usuario.telefone', ['label' => 'Telefone']);
            //echo $this->Form->input('usuario.password', ['label' => 'Senha']);
            /*
            echo "<div class='input select required'>";
            echo $this->Form->label('modelo_referencia', 'Modelo de Referência');
            echo $this->Form->select(
                'modelo_referencia',
                [
                    ['value' => 'MR-MPS-SW', 'text' => 'MR-MPS-SW'],
                    ['value' => 'MR-MPS-SV', 'text' => 'MR-MPS-SV']
                ],
                ['multiple' => 'checkbox']
            );
            echo "</div>";
            */
            echo "<div class='input select required'>";
            echo $this->Form->label('is_coordenador', 'É coordenador de II?');
            echo $this->Form->radio(
                'is_coordenador',
                [
                    ['value' => '1', 'text' => 'Sim'],
                    ['value' => '0', 'text' => 'Não']
                ]
            );
            echo "</div>";
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script type="application/javascript">
    var usuarios = <?php echo $usuarios; ?>;
  
    $(document).ready(function(){
        $('#usuario-telefone').inputmask({
            mask: '(99)9999-9999?'
        });
      
        $( "#usuario-nome" ).autocomplete({
            source: usuarios,
            focus: function( event, ui ) {
                $( "#usuario-nome" ).val( ui.item.label );
                return false;
            },
            select: function( event, ui ) {
                console.log(ui.item);

                $( "#usuario-id" ).val( ui.item.id );
                $( "#usuario-nome" ).val( ui.item.label );
                $( "#usuario-email" ).val( ui.item.email );
                
                if(ui.item.endereco != "") {
                  $( "#usuario-endereco" ).val( ui.item.endereco );
                }
                
                if(ui.item.telefone != "") {
                  $( "#usuario-telefone" ).val( ui.item.telefone );
                }
                return false;
          }
       });
    });
</script>