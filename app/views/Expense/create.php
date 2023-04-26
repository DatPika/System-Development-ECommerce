<?php $this->view('shared/header',_('Add Expense')); ?>

<div class="createPage">

	<div class="container">

		<h1 class="form-title"><?= _('Add expense')?></h1>
		
		<form method="post" action="">

			<div class="info">
				<div class ="input-box">
					<label><?= _('Supplier Name') ?></label><input type="text" name="supplierName" id="supplierName" required>
				</div>
				<div class ="input-box">
					<label><?= _('Details') ?></label><textarea name="details" id="details"></textarea>
				</div>
				<div class ="input-box">
					<label><?= _('Amount') ?></label><input type="text" name='totalExpense' id="totalExpense" required>
				</div>
			</div>
			<div class="form-submit-btn">
				<input type="submit" name="action" value='<?= _('Add record') ?>'>
			</div>
			
		</form>

	</div>

</div>

<?php $this->view('shared/footer'); ?>