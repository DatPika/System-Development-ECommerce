<?php $this->view('shared/header',_('Add Expense')); ?>

<div class="container">

	<h1 class="pageHeader"><?= _('Add expense')?></h1>
	
	<form method="post" action="">
		<label><?= _('Supplier Name') ?></label><input type="text" name="supplierName"><br>
		<label><?= _('Details') ?></label><textarea name="details"></textarea><br>
		<label><?= _('Amount') ?></label><input type="text" name='totalExpense'>

		<input type="submit" name="action" value='<?= _('Add record') ?>'>
	</form>

</div>

<?php $this->view('shared/footer'); ?>