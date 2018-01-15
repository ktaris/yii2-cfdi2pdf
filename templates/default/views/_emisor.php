<?php
use ktaris\cfdi\catalogos\base\RegimenFiscal;
?>

<div class="titulo">
    <p>Emisor</p>
</div>
<table>
    <tbody>
        <tr>
            <th class="fixed-width-left text-right">RFC</th>
            <td class="rfc"><?= $CFDI->Emisor->Rfc ?></td>
            <th class="nombre text-right">Nombre</th>
            <td><?= $CFDI->Emisor->Nombre ?></td>
        </tr>
        <tr>
            <th class="fixed-width-left text-right">Régimen Fiscal</th>
            <td colspan="3">
                <?= $CFDI->Emisor->RegimenFiscal ?>
                -
                <?= RegimenFiscal::descripcion($CFDI->Emisor->RegimenFiscal) ?>
            </td>
        </tr>
        <?php if ($CFDI->EmisorExtra) : ?>
        <tr>
            <th class="fixed-width-left text-right">Dirección</th>
            <td colspan="3">
                <?= $CFDI->EmisorExtra->direccion ?>
            </td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
