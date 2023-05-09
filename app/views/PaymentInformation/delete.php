<?php $this->view('shared/header',_('Delete Payment Information')); ?>


<div class="createPage">

	<div class="container">

		<h1 class="form-title"><?= _('Delete expense')?></h1>
		<h2><?= _("Are your sure you want to delete this record?")?></h2>
		
		<form method="post" action="">

			<div class="info">
				<div class ="input-box">
					<label><?= _('Amount') ?></label><input type="text" name="amount" id="amount" value="<?= $data->amount?>" readonly="readonly">
				</div>
				<div class ="input-box">
					<label><?= _('Date') ?></label><input name="date" value="<?=\app\core\TimeHelper::DTOutBrowser($data->date)?>"id="date" readonly>
				</div>
				<div class ="input-box">
					<label><?= _('Payment Method') ?></label><input type="text" name='paymentMethod' id="paymentMethod" value="<?= $data->paymentMethod?>" readonly="readonly">
				</div>
			</div>
			<div class="form-submit-btn">
				<a href="/PaymentInformation/index/<?= $data->payment_id ?>"><?= _('Cancel') ?></a>
			</div>
			<div class="form-submit-btn">
				<input type="submit" name="action" value='<?= _('Delete record') ?>'>
			</div>
			
		</form>

	</div>

</div>

<?php $this->view('shared/footer'); ?>