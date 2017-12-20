<?php
use ktaris\cfdi2pdf\CfdiHelper;
use ktaris\cfdi\catalogos\base\Impuesto;
use ktaris\cfdi\catalogos\base\FormaPago;
use ktaris\cfdi\catalogos\base\MetodoPago;
?>

<div class="titulo">
    <p>Conceptos</p>
</div>

<table class="conceptos">
    <thead>
        <tr>
            <th>C.ProdServ</th>
            <th>No. Id</th>
            <th>Descripción</th>
            <th>C.Unidad</th>
            <th>Cantidad</th>
            <th>Valor Unitario</th>
            <th>Importe</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($CFDI->Conceptos as $i => $concepto) {
            echo $this->render('_concepto', [
                'i' => $i,
                'concepto' => $concepto,
            ]);
        } ?>
        <tr class="resumen">
            <td colspan="4" rowspan="<?= ($CFDI->cantidadDeImpuestos + 1) ?>"><?= CfdiHelper::numeroALetra($CFDI->Total, [
                'prefijo' => '',
                'sufijo' => '',
                'moneda' => '<strong>'.$CFDI->Moneda.'</strong>',
            ]) ?></td>
            <th colspan="2" class="text-right">Subtotal</th>
            <td class="text-right"><?= $CFDI->SubTotal ?></td>
        </tr>
        <?php if ($CFDI->tieneImpuestos) : ?>
            <?php if ($CFDI->tieneTraslados) : ?>
            <?php foreach ($CFDI->Traslados as $i => $m) : ?>
                <tr>
                    <th colspan="2" class="text-right">Traslado de <?= Impuesto::descripcion($m->Impuesto) ?></th>
                    <td class="text-right"><?= $m->Importe ?></td>
                </tr>
            <?php endforeach; ?>
            <?php endif; ?>

            <?php if ($CFDI->tieneRetenciones) : ?>
            <?php foreach ($CFDI->Retenciones as $i => $m) : ?>
                <tr>
                    <th colspan="2" class="text-right">Retención de <?= Impuesto::descripcion($m->Impuesto) ?></th>
                    <td class="text-right"><?= $m->Importe ?></td>
                </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>
        <tr>
            <td colspan="5">
                <?php if (!empty($CFDI->FormaPago)) : ?>
                    <strong>Forma Pago</strong>
                    <?= $CFDI->FormaPago ?>
                    -
                    <?= FormaPago::descripcion($CFDI->FormaPago) ?>

                    &nbsp;
                <?php endif; ?>

                <strong>Método Pago</strong>
                <?= $CFDI->MetodoPago ?>
                -
                <?= MetodoPago::descripcion($CFDI->MetodoPago) ?>
            </td>
            <th class="text-right">Total</th>
            <td class="text-right"><?= $CFDI->Total ?></td>
        </tr>
    </tbody>
</table>
