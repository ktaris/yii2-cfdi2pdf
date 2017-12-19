<?php
use ktaris\cfdi\catalogos\base\TipoDeComprobante;
use ktaris\cfdi\catalogos\base\UsoCFDI;
use ktaris\cfdi\catalogos\base\RegimenFiscal;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
</head>
<body id="pdf">
    <div class="titulo header">
        <p>Comprobante Fiscal Digital a través de Internet, v3.3</p>
    </div>

    <table>
        <tbody>
            <tr>
                <th class="fixed-width-left text-right">UUID</th>
                <td><?= $CFDI->TimbreFiscalDigital->UUID ?></td>
                <th class="text-right">No. Certificado</th>
                <td><?= $CFDI->NoCertificado ?></td>
            </tr>
            <tr>
                <th class="fixed-width-left text-right">Fecha</th>
                <td><?= $CFDI->Fecha ?></td>
                <th class="text-right">Tipo Comprobante</th>
                <td>
                    <?= $CFDI->TipoDeComprobante ?>
                    -
                    <?= TipoDeComprobante::descripcion($CFDI->TipoDeComprobante) ?>
                </td>
            </tr>
            <tr>
                <th class="fixed-width-left text-right">Serie</th>
                <td><?= $CFDI->Serie ?></td>
                <th class="text-right">Lugar de Expedición</th>
                <td><?= $CFDI->LugarExpedicion ?></td>
            </tr>
            <tr>
                <th class="fixed-width-left text-right">Folio</th>
                <td colspan="3"><?= $CFDI->Folio ?></td>
            </tr>
        </tbody>
    </table>

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
        </tbody>
    </table>

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
        </tbody>
    </table>

    <?= $this->render('_conceptos', ['CFDI' => $CFDI]) ?>

    <?= $this->render('_tfd', ['CFDI' => $CFDI]) ?>
</body>
</html>

<?php
$pdf->methods['SetHTMLFooter'] = <<<CFDIFOOTER
    <div class="footer">
        <table>
            <thead>
                <tr>
                    <td>
                        Este documento es una representación impresa de un CFDI.
                    </td>
                    <td class="text-right">
                        Página {PAGENO} de {nbpg}
                    </td>
                </tr>
            </thead>
        </table>
    </div>
CFDIFOOTER;
?>
