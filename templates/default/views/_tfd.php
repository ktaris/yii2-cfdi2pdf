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
            <td rowspan="4" class="vertical-top padding-top-4">
                <barcode disableborder="1" code="<?= CfdiHelper::textoQr($CFDI) ?>" type="QR" class="barcode" size="1.75" error="M" />
            </td>
            <th class="b-border">
                Sello del CFDI
            </th>
            <th class="b-border">
                Sello del SAT
            </th>
        </tr>
        <tr>
            <td>
                <code><?= CfdiHelper::trimmer($CFDI->Sello, 50) ?></code>
            </td>
            <td class="bordered">
                <code><?= CfdiHelper::trimmer($tfd->SelloSAT, 50) ?></code>
            </td>
        </tr>
        <tr>
            <th class="t-border b-border" colspan="2">
                Cadena Original
            </th>
        </tr>
        <tr>
            <td class="bordered" colspan="2">
                <code><?= CfdiHelper::trimmer($CFDI->CadenaOriginal, 101) ?></code>
            </td>
        </tr>
    </tbody>
</table>
<table>
    <tbody>
        <tr>
            <th class="text-right">Fecha Timbrado</th>
            <td><?= $CFDI->TimbreFiscalDigital->FechaTimbrado ?></td>
            <th class="text-right">No. Certificado SAT</th>
            <td><?= $CFDI->TimbreFiscalDigital->NoCertificadoSAT ?></td>
        </tr>
    </tbody>
</table>

<?php endif;
