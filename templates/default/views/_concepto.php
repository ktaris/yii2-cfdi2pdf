<?php
$clase = ($i === 0) ? 'primero' : 'no-primero';
?>

<tr class="concepto <?= $clase ?>">
    <td><?= $concepto->NoIdentificacion ?></td>
    <td><?= $concepto->Descripcion ?></td>
    <td><?= $concepto->ClaveProdServ ?></td>
    <td><?= $concepto->ClaveUnidad ?></td>
    <td><?= $concepto->Cantidad ?></td>
    <td><?= $concepto->ValorUnitario ?></td>
    <td><?= $concepto->Importe ?></td>
</tr>
<?php if ($concepto->tieneImpuestos) : ?>
    <?= $this->render('_impuestos', [
        'concepto' => $concepto,
    ]) ?>
<?php endif; ?>
