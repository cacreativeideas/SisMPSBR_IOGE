<div class="empresas form">
    <?= $this->Form->create($empresa) ?>
    <fieldset>
        <legend><?= __('Editar Empresa') ?></legend>

        <div class="alert fade in hide" role="alert">
            <button type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div id="message-alert"></div>
        </div>

        <?php
            echo $this->Form->input('razao_social', ['label' => 'Razão Social']);
            echo $this->Form->input('nome', ['label' => 'Nome']);
            //echo $this->Form->input('cnpj', ['label' => 'CNPJ']);
        ?>

        <div class="input text required">
            <label for="cnpj">CNPJ</label>
            <div class="input-group m-b-1">
                <input id="cnpj" type="text" name="cnpj" class="form-control"
                       maxlength="45" required="required" value="<?php echo $empresa['cnpj'] != "" ? $empresa['cnpj'] : ""; ?>">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" onclick="validarCNPJ();" type="button">Verificar CNPJ</button>
                </span>
            </div>
        </div>

        <?php
            echo $this->Form->input('endereco', ['label' => 'Endereço']);
            echo $this->Form->input('descricao_atividades', ['label' => 'Descrição de Atividades']);
            echo $this->Form->input('porte', [
                'label' => 'Porte',
                'options' =>   [
                    'Até 9 empregados' => 'Até 9 empregados',
                    'De 10 a 49 empregados' => 'De 10 a 49 empregados',
                    'De 50 a 99 empregados' => 'De 50 a 99 empregados',
                    'Mais de 100 empregados' => 'Mais de 100 empregados'
                ]
            ]);
            //echo $this->Form->input('porte');
            echo $this->Form->input('website', ['label' => 'URL do website']);
            //echo $this->Form->input('logo', ['label' => 'Inserir Logo']);
        ?>

        <div class="input file required">
            <label for="logo">Inserir Logo</label>
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
                        <input id="logo" type="file" name="logo">
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
    $(document).ready(function(){
        //carregar logo
        var id = "<?php echo $empresa['id'] ?>";
        var logo = "<?php echo $empresa['logo'] ?>";

        $( ".fileinput-filename" ).html( logo );
        var img = new Image();
        img.src = "http://localhost:8888/mps_ioge/uploads/empresas/" + id + "/" + logo;
        $("#fileinput-logo").remove();
        $(".fileinput-new.thumbnail").append(img);

        $('#cnpj').inputmask({
            mask: '99.999.999/9999-99'
        });

        $('.close').click( function () {
            $(".alert").removeClass("alert-success");
            $(".alert").removeClass("alert-danger");
            $(".alert").removeClass("alert-warning");

            $(".alert").addClass("hide");
        });
    });

    function validarCNPJ(){
        var cnpj = $("#cnpj").val();

        $.ajax({
            url         :   "<?php echo $this->Url->build(array('action'=>'validarCnpj')); ?>",
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