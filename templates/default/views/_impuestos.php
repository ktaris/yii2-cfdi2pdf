<?php if ($concepto->tieneTraslados) : ?>
<tr class="traslados">
<td colspan="7" class="text-right">
<strong>Traslados</strong>
<?php foreach ($concepto->Traslados as $i => $impuesto) : ?>
    <?= $this->render('_impuesto', [
        'impuesto' => $impuesto
    ]) ?>
<?php endforeach; ?>
</td>
</tr>
<?php endif; ?>

<?php if ($concepto->tieneRetenciones) : ?>
<tr class="retenciones">
<td colspan="7" class="text-right">
<strong>Retenciones</strong>
<?php foreach ($concepto->Retenciones as $i => $impuesto) : ?>
    <?= $this->render('_impuesto', [
        'impuesto' => $impuesto
    ]) ?>
<?php endforeach; ?>
</td>
</tr>
<?php endif; ?>
