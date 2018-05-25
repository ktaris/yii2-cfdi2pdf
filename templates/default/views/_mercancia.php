<?php
$clase = ($i === 0) ? 'primero' : 'no-primero';
?>

<tr class="mercancia <?= $clase ?>">
    <td><?= $model->NoIdentificacion ?></td>
    <td><?= $model->FraccionArancelaria ?></td>
    <td><?= $model->UnidadAduana ?></td>
    <td class="text-right"><?= $model->CantidadAduana ?></td>
    <td class="text-right"><?= $model->ValorUnitarioAduana ?></td>
    <td class="text-right"><?= $model->ValorDolares ?></td>
</tr>
