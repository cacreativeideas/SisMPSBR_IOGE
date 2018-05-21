<div class="usuarios form">
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        <legend><?= __('Editar Usuário') ?></legend>
        <?php
        echo $this->Form->input('nome', ['label' => 'Nome']);
        echo $this->Form->input('email', ['label' => 'E-mail']);
        echo $this->Form->input('endereco', ['label' => 'Endereço']);
        echo $this->Form->input('telefone', ['label' => 'Telefone']);
        echo $this->Form->input('role', [
            'label' => 'Perfil',
            'options' =>   ['coord_ioge' => 'Coordenador IOGE',
                'coord_ii' => 'Coordenador II',
                'consultor' => 'Consultor',
                'colaborador' => 'Colaborador (Empresa)',
                'admin' => 'Administrador']
        ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
