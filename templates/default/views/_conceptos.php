<div class="titulo">
    <p>Conceptos</p>
</div>

<table class="conceptos">
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
                'i' => $i,
                'concepto' => $concepto,
            ]);
        } ?>
    </tbody>
</table>
