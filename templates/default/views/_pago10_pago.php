<?php
use ktaris\cfdi\catalogos\base\FormaPago;
use ktaris\cfdi\catalogos\base\MetodoPago;
use ktaris\cfdi\catalogos\base\Moneda;
?>

<table>
    <tbody>
        <tr>
            <th class="fixed-width-left text-right">Fecha de pago</th>
            <td><?= $pago->FechaPago ?></td>
            <th class="text-right">Forma de pago</th>
            <td>
                <?= $pago->FormaDePagoP ?>
                -
                <?= FormaPago::descripcion($pago->FormaDePagoP) ?>
            </td>
        </tr>
        <tr>
            <th class="fixed-width-left text-right">Moneda</th>
            <td>
                <?= $pago->MonedaP ?>
                -
                <?= Moneda::descripcion($pago->MonedaP) ?>
            </td>
            <th class="text-right">Monto</th>
            <td><?= $pago->Monto ?></td>
        </tr>
        <tr>
            <th class="fixed-width-left text-right">Cta Ordenante</th>
            <td><?= $pago->CtaOrdenante ?></td>
            <th class="text-right">Emisor Cuenta Ordenante</th>
            <td><?= $pago->RfcEmisorCtaOrd ?></td>
        </tr>
        <tr>
            <th class="fixed-width-left text-right">Cta Beneficiario</th>
            <td><?= $pago->CtaBeneficiario ?></td>
            <th class="text-right">Emisor Cuenta Beneficiario</th>
            <td><?= $pago->RfcEmisorCtaBen ?></td>
        </tr>
    </tbody>
</table>
<?= $this->render('_pago10_doctos_relacionados', [
    'i' => $i,
    'model' => $pago,
]); ?>
