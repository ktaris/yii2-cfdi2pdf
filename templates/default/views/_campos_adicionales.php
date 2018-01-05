<?php if (!empty($CFDI->tieneCamposAdicionales)) : ?>

<div class="titulo">
    <p>Campos Adicionales</p>
</div>

<table class="campos-adicionales">
    <tbody>
        <?php
        $lastIndex = count($CFDI->CamposAdicionales) - 1;
        foreach ($CFDI->CamposAdicionales as $index => $model) :
            echo $this->render('_campo_adicional', [
                'index' => $index,
                'model' => $model,
                'lastIndex' => $lastIndex,
            ]);
        endforeach;
        ?>
    </tbody>
</table>

<?php endif; ?>
