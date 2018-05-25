<?php
use ktaris\cfdi\catalogos\base\TipoDeComprobante;
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
                <th class="fixed-width-left-logo text-right">UUID</th>
                <td><?= $CFDI->Complemento->TimbreFiscalDigital->UUID ?></td>
                <th class="fixed-width-left-logo-2 text-right">No. Certificado</th>
                <td><?= $CFDI->NoCertificado ?></td>
                <td class="logotipo-holder" rowspan="4">
                    <?php
                    if (!empty($CFDI->AtributosAdicionales) && !empty($CFDI->AtributosAdicionales->logotipo_url)) {
                        echo '<img class="logo" src="'.$CFDI->AtributosAdicionales->logotipo_url.'" />';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th class="fixed-width-left-logo text-right">Fecha</th>
                <td><?= $CFDI->Fecha ?></td>
                <th class="fixed-width-left-logo-2 text-right">Tipo Comprobante</th>
                <td>
                    <?= $CFDI->TipoDeComprobante ?>
                    -
                    <?= TipoDeComprobante::descripcion($CFDI->TipoDeComprobante) ?>
                </td>
            </tr>
            <tr>
                <th class="fixed-width-left-logo text-right">Serie</th>
                <td><?= $CFDI->Serie ?></td>
                <th class="fixed-width-left-logo-2 text-right">Lugar de Expedición</th>
                <td><?= $CFDI->LugarExpedicion ?></td>
            </tr>
            <tr>
                <th class="fixed-width-left-logo text-right">Folio</th>
                <td colspan="2"><?= $CFDI->Folio ?></td>
            </tr>
        </tbody>
    </table>

    <?= $this->render('_emisor', ['CFDI' => $CFDI]) ?>

    <?= $this->render('_receptor', ['CFDI' => $CFDI]) ?>

    <?= $this->render('_campos_adicionales', ['CFDI' => $CFDI]) ?>

    <?= $this->render('_conceptos', ['CFDI' => $CFDI]) ?>

    <?= $this->render('_cce', ['CFDI' => $CFDI]) ?>

    <?= $this->render('_tfd', ['CFDI' => $CFDI]) ?>
</body>
</html>

<?php
if (!empty($CFDI->AtributosAdicionales) && !empty($CFDI->AtributosAdicionales->leyenda)) {
$leyenda_html = <<<LEYENDA_HTML
<table class="leyenda-pie">
    <thead>
        <tr>
            <td class="text-center">
                {$CFDI->AtributosAdicionales->leyenda}
            </td>
        </tr>
    </thead>
</table>
LEYENDA_HTML;
} else {
    $leyenda_html = '';
}

$pdf->methods['SetHTMLFooter'] = <<<CFDIFOOTER
    <div class="footer">
        {$leyenda_html}
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
