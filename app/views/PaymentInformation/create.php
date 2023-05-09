<?php $this->view('shared/header',_('Add Payment Information')); ?>
<div class="createPage">

	<div class="container">

		<h1 class="form-title"><?= _('Add Payment Information')?></h1>
		
		<form method="post" action="">

			<div class="info">
				<div class ="input-box">
					<label><?= _('Payment Method') ?></label><input type="text" name="paymentMethod" id="paymentMethod" class="text-field" required>
				</div>
				<div class ="input-box">
					<label><?= _('Amount') ?></label><input type="text" name='amount' id="amount" class="text-field" required>
				</div>
				<div class ="input-box">
					<label><?= _('Date') ?></label><input type="text" name="date" class="text-field">
				</div>
				<div class ="input-box">
					<label><?= _('Select the user:') ?></label><select name='user_id'>
					<?php
					foreach ($data as $user) {
						echo "<option value='$user->user_id'>$user->username</option>\n";
					}
					?>
					</select><br>
				</div>
			</div>
			<div class="form-submit-btn">
				<input type="submit" name="action" value='<?= _('Add record') ?>'>
			</div>

			
		</form>

	</div>

</div>

<?php $this->view('shared/footer'); ?>