<?php
use ktaris\cfdi\catalogos\base\Impuesto;
?>

<strong>[</strong>
<strong>Impuesto</strong>
<?= $impuesto->Impuesto ?> - <?= Impuesto::descripcion($impuesto->Impuesto) ?>

<strong>Importe</strong>
<?= $impuesto->Importe ?>
<strong>] </strong>
