<?php $this->view('shared/header',_('Delete Table')); ?>


<div class="createPage">

	<div class="container">

		<h1 class="form-title"><?= _('Delete expense')?></h1>
		<h2><?= _("Are your sure you want to delete this record?")?></h2>
		
		<form method="post" action="">

			<div class="expense-info">
				<div class ="input-box">
					<label><?= _('Supplier Name') ?></label><input type="text" name="supplierName" id="supplierName" value="<?= $data->supplierName?>" readonly="readonly">
				</div>
				<div class ="input-box">
					<label><?= _('Details') ?></label><textarea name="details" id="details" readonly="readonly"><?= $data->details?></textarea>
				</div>
				<div class ="input-box">
					<label><?= _('Amount') ?></label><input type="text" name='totalExpense' id="totalExpense" value="<?= $data->totalExpense?>" readonly="readonly">
				</div>
			</div>
			<div class="form-submit-btn">
				<a href="/Expense/index"><?= _('Cancel') ?></a>
			</div>
			<div class="form-submit-btn">
				<input type="submit" name="action" value='<?= _('Delete record') ?>'>
			</div>
			
		</form>

	</div>

</div>

<?php $this->view('shared/footer'); ?>