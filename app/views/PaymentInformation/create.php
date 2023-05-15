<?php $this->view('shared/header',_('Add New Payment')); ?>
<figure class="back hover-underline-animation">
<a href="/PaymentInformation/index/<?=$data[1]?>"><img src="/images/back-arrow.png" alt="Go Back"></a>
	 <figcaption><?=_('Back')?></figcaption>
</figure>
<div class="createPage">

	<div class="container">
		<h1 class="form-title"><?= _('Add New Payment')?></h1>

		<form method="post" action="">
			<div class="payment">
			<label><?=_('Payment Information')?>:</label>
				<div class="bottom">
					<div class="left">
						<div class="input-box">
							<label><?= _('Date:') ?></label>
							<input type="date" name="date" class="text-field">
						</div>
						<div class="input-box">
							<label><?= _('Amount:') ?></label>
							<input type="text" name="amount" class="text-field" placeholder="<?= _('Amount') ?>">
						</div>
						<div class="input-box">
							<label><?= _('Select the user:') ?></label>
							<select name="user_id">
								<?php
									foreach ($data[0] as $user) {
										echo "<option value='$user->user_id'";
										echo ($user->user_id == $_SESSION['user_id']) ? "selected": "";
										echo ">$user->username</option>";
									}
								?>
							</select>
						</div>
					</div>
					<div class="right">
						<label><?= _('Payment Method:') ?></label>
						<div class="input-box">
							<label style="margin-left: 140px;"><?= _('Cash') ?></label>
							<input style="margin-right: 140px;" type="radio" name="payment1" value="cash">
						</div>
						<div class="input-box">
							<label style="margin-left: 140px;"><?= _('Interac') ?></label>
							<input style="margin-right: 140px;" type="radio" name="payment1" value="interac">
						</div>
						<div class="input-box">
							<label style="margin-left: 140px;"><?= _('E-Transfer') ?></label>
							<input style="margin-right: 140px;" type="radio" name="payment1" value="e-transfer">
						</div>
					</div>
				</div>
			</div>
			<div class="form-submit-btn">
				<input type="submit" name="action" value='<?= _('Add Payment') ?>'>
			</div>

			
		</form>

	</div>

</div>

<?php $this->view('shared/footer'); ?>