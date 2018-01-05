<?php if ($index % 2 == 0) : ?>
    <tr>
<?php endif; ?>

<th><?= $model->label ?></th>
<td><?= $model->value ?></td>

<?php if ($index % 1 == 1 || $index == $lastIndex) : ?>
    <tr>
<?php endif; ?>
