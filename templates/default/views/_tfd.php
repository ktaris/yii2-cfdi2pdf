<?php
use ktaris\cfdi2pdf\CfdiHelper;

if (!empty($CFDI->TimbreFiscalDigital) && !empty($CFDI->TimbreFiscalDigital->Version)) :
    $tfd = $CFDI->TimbreFiscalDigital;
?>

<strong>Sello del SAT</strong>
<br>
<code><?= CfdiHelper::trimmer($tfd->SelloSAT) ?></code>

<?php endif;
