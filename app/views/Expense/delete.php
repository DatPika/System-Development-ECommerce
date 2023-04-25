<?php $this->view('shared/header',_('Delete Table')); ?>

<div class="container">

	<h1 class="pageHeader"><?= _('Delete expense')?></h1>

	<h2>Are your sure you want to delete this record?</h2>
	
	<table>
		
		<tr><th><?= _('Supplier name') ?></th><th><?= _('Details') ?></th><th><?= _('Expense') ?></th></tr>
		<td><?= htmlentities($data->supplierName) ?></td>
		<td><?= htmlentities($data->details) ?></td>
		<td><?= htmlentities($data->totalExpense) ?></td>
	</table>

	<form method="post" action="">
		<input type="submit" name="action" value='<?= _('Delete') ?>'>
		<a href="/Expense/index"><?= _('Cancel') ?></a>
	</form>


</div>

<?php $this->view('shared/footer'); ?>