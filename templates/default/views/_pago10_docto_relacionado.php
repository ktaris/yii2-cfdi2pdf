<?php
$clase = ($i === 0) ? 'primero' : 'no-primero';
?>

<tr class="pago10_docto_relacionado <?= $clase ?>">
    <td><?= $model->IdDocumento ?></td>
    <td><?= $model->Serie ?></td>
    <td><?= $model->Folio ?></td>
    <td><?= $model->MonedaDR ?></td>
    <td><?= $model->TipoCambioDR ?></td>
    <td><?= $model->MetodoDePagoDR ?></td>
    <td class="text-right"><?= $model->NumParcialidad ?></td>
    <td class="text-right"><?= $model->ImpSaldoAnt ?></td>
    <td class="text-right"><?= $model->ImpPagado ?></td>
    <td class="text-right"><?= $model->ImpSaldoInsoluto ?></td>
</tr>
