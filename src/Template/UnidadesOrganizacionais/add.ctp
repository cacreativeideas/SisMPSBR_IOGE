<div class="unidadesOrganizacionais form">
    <?= $this->Form->create($unidadesOrganizacionai) ?>
    <fieldset>
        <legend><?= __('Adicionar Unidade Organizacional') ?></legend>
        <?php
        echo $this->Form->input('empresa_id', ['empty' => 'Selecione', 'options' => $empresas, 'required' => 'required' ]);
        echo $this->Form->input('nome', ['label' => 'Nome']);
        echo $this->Form->input('descricao_atividades', ['label' => 'Descrição de Atividades']);
        echo "<div class='input radio required'>";
        echo $this->Form->label('modelo_referencia','Modelo de Referência');
        echo $this->Form->radio(
            'modelo_referencia',
            [
                ['value' => 'MR-MPS-SW', 'text' => 'MR-MPS-SW'],
                ['value' => 'MR-MPS-SV', 'text' => 'MR-MPS-SV']
            ]
        );
        echo "</div>";
        echo $this->Form->input('versao_modelo', ['label' => 'Versão do Modelo']);
        echo $this->Form->input('nivel_mps', [
            'label' => 'Nível',
            'options' =>   ['G' => 'G',
                'F' => 'F',
                'F com G' => 'F com G',
                'E' => 'E',
                'D' => 'D',
                'C' => 'C',
                'B' => 'B',
                'A' => 'A'
            ]
        ]);

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
