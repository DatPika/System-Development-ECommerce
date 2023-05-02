<?php $this->view('shared/header',_('Expense Table')); ?>

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
			<td><input type="checkbox" value="$supplier->supplierName"></td>
			<td><?= htmlentities($supplier->supplierName) ?></td>
		</tr>
	</tbody>

<?php
}
?>

</table>

</div>

<div class="form-submit-btn">
	<input type="submit" name="action" value='<?= _('Done') ?>' onclick="UpdateSuppliers()" id="doneButton">
</div>

<?php $this->view('shared/footer'); ?>