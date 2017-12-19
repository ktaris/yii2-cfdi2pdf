<?php
use ktaris\cfdi2pdf\CfdiHelper;

if (!empty($CFDI->TimbreFiscalDigital) && !empty($CFDI->TimbreFiscalDigital->Version)) :
    $tfd = $CFDI->TimbreFiscalDigital;
?>

<div class="titulo">
    <p>Timbre Fiscal Digital</p>
</div>

<table>
    <tbody>
        <tr>
            <td rowspan="4">
                <barcode disableborder="1" code="<?= CfdiHelper::textoQr($CFDI) ?>" type="QR" class="barcode" size="1.8" error="M" />
            </td>
            <th>
                Sello del CFDI
            </th>
        </tr>
        <tr>
            <td>
                <code><?= CfdiHelper::trimmer($CFDI->Sello, 100) ?></code>
            </td>
        </tr>
        <tr>
            <th>
                Sello del SAT
            </th>
        </tr>
        <tr>
            <td>
                <code><?= CfdiHelper::trimmer($tfd->SelloSAT, 100) ?></code>
            </td>
        </tr>
    </tbody>
</table>

<?php endif;
