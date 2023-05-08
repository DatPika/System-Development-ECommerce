<?php $this->view('shared/header',_('Edit Supplier List')); ?>


<form method="post">

	<div class="createPage">
	<table class="content-table">
		<thead>
			<tr>
				<th><?= _('Shown') ?></th>
				<th><?= _('Supplier name') ?></th>
			</tr>
		</thead>
	<?php
	foreach ($data as $supplier) { ?>
		<tbody>
			<tr>

				<?php

				$file = fopen("resources/supplierList.txt", "r");
				$dataFile = fgetcsv($file);

				if ($dataFile && in_array($supplier->supplierName, $dataFile)) {
				?>
					<td><input type="checkbox" name="supplierName[]" value="<?=$supplier->supplierName?>" checked></td>
					<td><?= htmlentities($supplier->supplierName) ?></td>
				<?php
				}
				else{
				?>
					<td><input type="checkbox" name="supplierName[]" value="<?=$supplier->supplierName?>"></td>
					<td><?= htmlentities($supplier->supplierName) ?></td>
				<?php
				}
				?>
			</tr>
		</tbody>


	<?php
	}
	?>
	</table>
	</div>

	<div class="form-submit-btn">
		<input type="submit" name="action" value='<?= _('Done') ?>'>
	</div>

</form>

<?php $this->view('shared/footer'); ?>