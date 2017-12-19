<div class="titulo">
    <p>Conceptos</p>
</div>

<table class="conceptos">
    <thead>
        <tr>
            <th>No. Id</th>
            <th>Descripción</th>
            <th>C.Producto</th>
            <th>C.Unidad</th>
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
