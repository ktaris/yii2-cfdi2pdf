<?php
if (!empty($model->DoctosRelacionados)) :
?>

<table class="pago10_doctos_relacionados">
    <thead>
        <tr>
            <th>Id Documento</th>
            <th>Serie</th>
            <th>Folio</th>
            <th>Moneda</th>
            <th>T.Cambio</th>
            <th>M.Pago</th>
            <th>#Parcial</th>
            <th>S.Anterior</th>
            <th>Pago</th>
            <th>S.Insoluto</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($model->DoctosRelacionados as $i => $docto) {
            echo $this->render('_pago10_docto_relacionado', [
                'i' => $i,
                'model' => $docto,
            ]);
        } ?>
    </tbody>
</table>

<?php endif;
