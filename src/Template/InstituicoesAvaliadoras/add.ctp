<div class="instituicoesAvaliadoras form">
    <?= $this->Form->create($instituicoesAvaliadora, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Adicionar Instituição Avaliadora') ?></legend>

        <div class="alert fade in hide" role="alert">
            <button type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div id="message-alert"></div>
        </div>

        <?php
            echo $this->Form->input('instituicao.id');
            echo $this->Form->input('instituicao.nome', ['label' => 'Nome']);
            echo $this->Form->input('instituicao.razao_social', ['label' => 'Razão Social']);
            //echo $this->Form->input('instituicao.cnpj', ['label' => 'CNPJ']);
        ?>

        <div class="input text required">
            <label for="instituicao-cnpj">CNPJ</label>
            <div class="input-group m-b-1">
                <input id="instituicao-cnpj" type="text" name="instituicao[cnpj]" class="form-control"
                       maxlength="45" required="required">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" onclick="validarCNPJ();" type="button">Validar CNPJ</button>
                </span>
            </div>
        </div>

        <?php
            echo $this->Form->input('instituicao.endereco', ['label' => 'Endereço']);
            echo $this->Form->input('instituicao.telefone', ['label' => 'Telefone']);
            echo $this->Form->input('instituicao.website', ['label' => 'URL do website']);
        ?>

        <?php
            //echo $this->Form->input('instituicao.logo', ['type' => 'file', 'label' => 'Inserir Logo']);

            echo $this->Form->input('nome_contato');
            echo $this->Form->input('email_contato');
            echo $this->Form->input('telefone_contato');
            //echo $this->Form->input('instituicao_id', ['options' => $instituicoes]);
        ?>


        <div class="input file required">
            <label for="instituicao-logo">Inserir Logo</label>
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail">
                    <img id="fileinput-logo" src="http://placehold.it/200x150" alt="Logo">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail"
                     style="max-width: 200px; max-height: 150px;">
                </div>
                <span class="fileinput-filename"></span>
                <div>
                    <span class="btn btn-default btn-file">
                        <span class="fileinput-new">Selecionar Imagem</span>
                        <span class="fileinput-exists">Mudar</span>
                        <input id="instituicao-logo" type="file" name="instituicao[logo]" required="required">
                    </span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                </div>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script type="application/javascript">
    var instituicoes = <?php echo $instituicoes; ?>;

    $(document).ready(function(){
        $('#instituicao-cnpj').inputmask({
            mask: '99.999.999/9999-99'
        });
      
        $('#instituicao-telefone').inputmask({
            mask: '(99)9999-9999'
        });
      
        $('#telefone-contato').inputmask({
            mask: '(99)9999-9999'
        });

        $('.close').click( function () {
            $(".alert").removeClass("alert-success");
            $(".alert").removeClass("alert-danger");
            $(".alert").removeClass("alert-warning");

            $(".alert").addClass("hide");
        });

        $( "#instituicao-nome" ).autocomplete({
            source: instituicoes,
            focus: function( event, ui ) {
                $( "#instituicao-nome" ).val( ui.item.label );
                return false;
            },
            select: function( event, ui ) {
                $( "#instituicao-id" ).val( ui.item.id );
                $( "#instituicao-razao-social" ).val( ui.item.razaoSocial );
                $( "#instituicao-cnpj" ).val( ui.item.cnpj );
                $( "#instituicao-endereco" ).val( ui.item.endereco );
                $( "#instituicao-telefone" ).val( ui.item.telefone );
                $( "#instituicao-website" ).val( ui.item.website );

                if(ui.item.logo != "") {
                    $(".fileinput-filename").html(ui.item.logo);
                    $("#instituicao-logo").removeAttr("required");

                    var img = new Image();
                    img.src = "http://localhost:8888/mps_ioge/uploads/instituicoes/" + ui.item.id + "/" + ui.item.logo;

                    $("#fileinput-logo").remove();
                    $(".fileinput-new.thumbnail").append(img);
                }
                
                return false;
            }
        });
    });

    function validarCNPJ(){
        var cnpj = $("#instituicao-cnpj").val();

        $.ajax({
            url         :   "<?php echo $this->Url->build(array('controller'=>'empresas', 'action'=>'validarCnpj')); ?>",
            dataType    :   'json',
            type        :   'POST',
            data        :   JSON.stringify(cnpj),
            success     :   function (data) {

                if (data.isValid){
                    $(".alert").addClass("alert-success");
                    $("#message-alert").html("CNPJ é Válido.");
                }else{
                    $(".alert").addClass("alert-danger");
                    $("#message-alert").html("CNPJ é Inválido. Verifique valor inserido.");
                }

                $(".alert").removeClass("hide");
                $(".alert").alert();
            },
            error       : function(xhr) { // if error occured
                $(".alert").addClass("alert-warning");
                $("#message-alert").html("Insira dado no campo CNPJ.");

                $(".alert").removeClass("hide");
                $(".alert").alert();

                //console.log(xhr.statusText + xhr.responseText);
            }
        });
    }
</script>