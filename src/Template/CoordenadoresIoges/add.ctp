<div class="coordenadoresIoges form">
    <?= $this->Form->create($coordenadoresIoge) ?>
    <fieldset>
        <legend><?= __('Adicionar Coordenadores IOGE') ?></legend>
        <?php
            echo $this->Form->input('instituicao_organizadora_id', ['empty' => 'Selecione', 'options' => $instituicoesOrganizadoras,
                'required'=>'required']);
            echo $this->Form->input('usuario.nome', ['label' => 'Nome']);
            echo $this->Form->input('usuario.email', ['label' => 'E-mail']);
            echo $this->Form->input('usuario.endereco', ['label' => 'Endereço']);
            echo $this->Form->input('usuario.telefone', ['label' => 'Telefone']);
            //echo $this->Form->input('usuario.password', ['label' => 'Senha']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script type="application/javascript">
    $(document).ready(function(){
        $('#usuario-telefone').inputmask({
            mask: '(99)9999-9999?'
        });
    });
</script>