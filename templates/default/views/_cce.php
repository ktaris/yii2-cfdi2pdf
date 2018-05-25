<?php
use ktaris\cfdi2pdf\CfdiHelper;

if (!empty($CFDI->Complemento->ComercioExterior) && !empty($CFDI->Complemento->ComercioExterior->Version)) :
    $cce = $CFDI->Complemento->ComercioExterior;
?>

<div class="titulo">
    <p>Comercio Exterior</p>
</div>


<table class="mercancias">
    <thead>
        <tr>
            <th>No. Id</th>
            <th>F. Arancelaria</th>
            <th>Unidad</th>
            <th>Cantidad</th>
            <th>Valor Unitario</th>
            <th>Valor Dólares</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cce->Mercancias as $i => $mercancia) {
            echo $this->render('_mercancia', [
                'i' => $i,
                'model' => $mercancia,
            ]);
        } ?>
        <tr>
            <th class="text-right" colspan="5">Total USD</th>
            <td class="text-right"><?= $cce->TotalUSD ?></td>
        </tr>
    </tbody>
</table>


<?php endif;
