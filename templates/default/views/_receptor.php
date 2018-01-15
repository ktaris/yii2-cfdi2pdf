<?php
use ktaris\cfdi\catalogos\base\UsoCFDI;
?>

<div class="titulo">
    <p>Receptor</p>
</div>
<table>
    <tbody>
        <tr>
            <th class="fixed-width-left text-right">RFC</th>
            <td class="rfc"><?= $CFDI->Receptor->Rfc ?></td>
            <th class="nombre text-right">Nombre</th>
            <td><?= $CFDI->Receptor->Nombre ?></td>
        </tr>
        <tr>
            <th class="fixed-width-left text-right">Uso CFDI</th>
            <td colspan="3">
                <?= $CFDI->Receptor->UsoCFDI ?>
                -
                <?= UsoCFDI::descripcion($CFDI->Receptor->UsoCFDI) ?>
            </td>
        </tr>
        <?php if ($CFDI->ReceptorExtra) : ?>
        <tr>
            <th class="fixed-width-left text-right">Dirección</th>
            <td colspan="3">
                <?= $CFDI->ReceptorExtra->direccion ?>
            </td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
