<div class="usuarios form large-9 medium-8 columns content">
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        <legend><?= __('Cadastrar Senha de Usuário') ?></legend>

        <div class="alert fade in hide" role="alert">
            <button type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div id="message-alert"></div>
        </div>

        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('password', ['label' => 'Senha', 'required' => 'required']);
            echo $this->Form->input('confirm_password', ['label' => 'Confirmar Senha', 'type' => 'password', 'required' => 'required']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['type' => 'button', 'onclick' => 'validarDados();', 'class' => 'right' ]) ?>
    <?= $this->Form->end() ?>
</div>

<script type="application/javascript">
    function validarDados(){
        if( $("#password").val() === $("#confirm-password").val() ){
            var usuario = { id: "<?php echo $usuario->id; ?>" }
            usuario.password = $("#password").val();

            $.ajax({
                url         :   "<?php echo $this->Url->build(array('action'=>'setSenha', $usuario->cod_verificador)); ?>",
                dataType    :   'json',
                type        :   'POST',
                data        :   usuario
            });

            window.location.href = "http://localhost:8888/" + "<?php echo $this->Url->build(array('action'=>'login'));?>";
        }else{
            $(".alert").removeClass("hide");
            $(".alert").addClass("alert-danger");
            $("#message-alert").html("Password não confere. Verifique valores inseridos.");
            $(".alert").alert();
        }
    }
</script>