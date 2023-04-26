<?php $this->view('shared/header',_('Edit Expense')); ?>

<div class="container">

	<h1 class="pageHeader"><?= _('Edit expense')?></h1>
	
	<form method="post" action="">
		<label><?= _('Supplier Name') ?></label><input type="text" name="supplierName" value="<?= $data->supplierName?>"><br>
		<label><?= _('Details') ?></label><textarea name="details"><?= $data->details?></textarea><br>
		<label><?= _('Amount') ?></label><input type="text" name='totalExpense' value="<?= $data->totalExpense?>">

		<input type="submit" name="action" value='<?= _('Edit record') ?>'>
	</form>

</div>

<?php $this->view('shared/footer'); ?>