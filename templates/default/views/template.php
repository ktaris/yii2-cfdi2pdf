<!DOCTYPE html>
<html>
<head>
    <title>CFDI</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <meta charset="UTF-8" />
</head>
<body id="pdf">
    <table>
        <tbody>
            <tr>
                <td>Tipo Comprobante</td>
                <td><?= $CFDI->TipoDeComprobante ?></td>
            </tr>
        </tbody>
    </table>

    <table>
        <tbody>
            <tr>
                <td>RFC</td>
                <td><?= $CFDI->Emisor->Rfc ?></td>
            </tr>
        </tbody>
    </table>

    <div class="titulo">
        <p>Receptor</p>
    </div>
    <table>
        <tbody>
            <tr>
                <th class="text-right">RFC</th>
                <td><?= $CFDI->Receptor->Rfc ?></td>
                <th class="text-right">Nombre</th>
                <td><?= $CFDI->Receptor->Nombre ?></td>
            </tr>
            <tr>
                <th class="text-right">Uso CFDI</th>
                <td colspan="3"><?= $CFDI->Receptor->UsoCFDI ?></td>
            </tr>
        </tbody>
    </table>

    <?= $this->render('_conceptos', ['Conceptos' => $CFDI->Conceptos]) ?>

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
                    <td>
                        {PAGENO} de {nbpg}
                    </td>
                </tr>
            </thead>
        </table>
    </div>
CFDIFOOTER;
?>
