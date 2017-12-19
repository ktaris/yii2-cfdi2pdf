<?php
$clase = ($i === 0) ? 'primero' : 'no-primero';
?>

<tr class="concepto <?= $clase ?>">
    <td><?= $concepto->ClaveProdServ ?></td>
    <td><?= $concepto->NoIdentificacion ?></td>
    <td><?= $concepto->Descripcion ?></td>
    <td><?= $concepto->ClaveUnidad ?></td>
    <td class="text-right"><?= $concepto->Cantidad ?></td>
    <td class="text-right"><?= $concepto->ValorUnitario ?></td>
    <td class="text-right"><?= $concepto->Importe ?></td>
</tr>
<?php if ($concepto->tieneImpuestos) : ?>
    <?= $this->render('_impuestos', [
        'concepto' => $concepto,
    ]) ?>
<?php endif; ?>
