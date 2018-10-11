<?php
use ktaris\cfdi2pdf\CfdiHelper;

if (!empty($CFDI->Complemento->Pagos) && !empty($CFDI->Complemento->Pagos->Version)) :
    $pagos = $CFDI->Complemento->Pagos;
?>


<div class="titulo">
    <p>Pagos</p>
</div>

<?php foreach ($pagos->Pagos as $i => $pago) {
    echo $this->render('_pago10_pago', [
        'i' => $i,
        'pago' => $pago,
    ]);
} ?>


<?php endif;
