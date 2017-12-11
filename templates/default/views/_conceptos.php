<table>
    <thead>
        <tr>
            <th>No Identificación</th>
            <th>Descripción</th>
            <th>Clave Producto</th>
            <th>Clave Unidad</th>
            <th>Cantidad</th>
            <th>Valor Unitario</th>
            <th>Importe</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($Conceptos as $i => $concepto) {
            echo $this->render('_concepto', [
                'concepto' => $concepto,
            ]);
        } ?>
    </tbody>
</table>
