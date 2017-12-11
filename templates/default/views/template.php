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

<table>
    <tbody>
        <tr>
            <td>RFC</td>
            <td><?= $CFDI->Receptor->Rfc ?></td>
        </tr>
    </tbody>
</table>

<?= $this->render('_conceptos', ['Conceptos' => $CFDI->Conceptos]); ?>
