<div class="parcelas index">
    <h3><?= __('Parcelas de Pagamentos') ?></h3>

    <div class="btn-group m-b-2">
        <button class="btn btn-default dropdown-toggle" type="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa fa-plus m-r-1" aria-hidden="true"></span>Adicionar <span class="caret m-l-1"></span>
        </button>

        <ul class="dropdown-menu">
            
            <li><a href="<?= $this->Url->build([
                    "controller" => "Parcelas",
                    "action" => "addAPagar"
                ]); ?>">Parcelas à Pagar</a></li>
          
            <li><a href="<?= $this->Url->build([
                    "controller" => "Parcelas",
                    "action" => "addAReceber"
                ]); ?>">Parcelas à Receber</a></li>

        </ul>
    </div>

    <ul class="nav nav-tabs">
        <li id="liEntradas" role="presentation" class="active"><a href="javascript:showEntradasTable();">À Receber</a></li>
        <li id="liSaidas" role="presentation"><a href="javascript:showSaidasTable();">À Pagar</a></li>
    </ul>

    <table
        data-toggle="table"
        data-classes="table-responsive"
        data-locale="pt-BR"
        cellpadding="0"
        cellspacing="0">

        <thead>
            <tr>
                <th data-field="projeto"><?= $this->Paginator->sort('pagamento_id') ?></th>
                <th><?= $this->Paginator->sort('data_prevista_pagamento', 'Data Prevista de Pagamento') ?></th>
                <th><?= $this->Paginator->sort('valor_parcela', 'Valor') ?></th>
                <th><?= $this->Paginator->sort('data_pagamento', 'Data de Pagamento') ?></th>

                <th data-field="view" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="edit" data-width="60px" data-class="actions"><?= __('') ?></th>
                <th data-field="delete" data-width="60px" data-class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parcelas as $parcela): ?>
            <tr>
                <td><?= $parcela->has('pagamento') ? $this->Html->link($parcela->pagamento->id, ['controller' => 'Pagamentos', 'action' => 'view', $parcela->pagamento->id]) : '' ?></td>
                <td><?= h($parcela->data_prevista_pagamento) ?></td>
                <td><?= $this->Number->format($parcela->valor_parcela) ?></td>
                <td><?= h($parcela->data_pagamento) ?></td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-eye'></i>", ['action' => 'view', $parcela->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link("<i class='fa fa-pencil'></i>", ['action' => 'edit', $parcela->id],
                        ['escape' => false, 'class' => 'btn btn-default']) ?>
                </td>
                <td class="actions">
                    <?= $this->Form->postLink("<i class='fa fa-trash'></i>", ['action' => 'delete', $parcela->id],
                        ['escape' => false, 'class' => 'btn btn-default', 'confirm' => __('Are you sure you want to delete # {0}?',
                            $pagamento->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>


<script type="application/javascript">
    var dataForTable = <?= $dataTable ?> ;

    $(function () {
        $table.bootstrapTable({data: dataForTable});
    });

    function showEntradasTable(){
        $.ajax({
            url         :   "<?php echo $this->Url->build(array('action'=>'getEntradas')); ?>",
            dataType    :   'json',
            type        :   'POST',
            'success'   :   function(data) {
                $table.bootstrapTable('showLoading');
                dataForTable = JSON.parse(data['retorno']);
                $table.bootstrapTable('load', data);
                $("#liEntradas").addClass('active');
                $("#liSaidas").removeClass('active');
            }
        });
    }

    function showSaidasTable(){
        $.ajax({
            url         :   "<?php echo $this->Url->build(array('action'=>'getSaidas')); ?>",
            dataType    :   'json',
            type        :   'POST',
            'success'   :   function(data) {
                $table.bootstrapTable('showLoading');
                dataForTable = JSON.parse(data['retorno']);
                $table.bootstrapTable('load', data);
                $("#liEntradas").removeClass('active');
                $("#liSaidas").addClass('active');
            }
        });
    }

</script>

