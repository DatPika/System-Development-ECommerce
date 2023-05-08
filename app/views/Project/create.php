<?php $this->view('shared/header',_('Add Project')); ?>
<figure class="back hover-underline-animation" onclick="history.back()">
	 <img src="/images/back-arrow.png" alt="Go Back">
	 <figcaption>Back</figcaption>
</figure>
<div class="createPage">

	<div class="container">

		<h1 class="form-title"><?= _('Add project')?></h1>
		
		<form method="post" action="">
			<!-- TODO: implement an input box for user id/username-->
			<div class="project-info">
				<div class="general-info">
					<input type="text" name="client-name" class="text-field" placeholder="<?= _('Client Name') ?>">
					<input type="text" name="surface-area" class="text-field" placeholder="<?= _('Surface Area') ?>">
					<input type="text" name="lights" class="text-field" placeholder="<?= _('Lights') ?>">
					<input type="text" name="spots" class="text-field" placeholder="<?= _('Spots') ?>">
					<input type="text" name="vents" class="text-field" placeholder="<?= _('Vents') ?>">
					<input type="text" name="works" class="text-field" placeholder="<?= _('Works') ?>">
					<input type="text" name="project-cost" class="text-field" placeholder="<?= _('Project Cost') ?>">
					<div style="text-align: center;">
						<label style="margin-bottom: 5px;"><?= _('Renovation Type:') ?></label>
						<select name='renovation-type'>
							<option value='Installation'>Installation</option>
							<option value='Service'>Service</option>
						</select>
					</div>

				</div>
				<label><?=_('Deposit')?>:</label>
				<div class ="input-box">
					<label><?= _('Date') ?></label><input type="text" name='date1' id="date1" required>
				</div>
				<div class ="input-box">
					<label><?= _('Amount') ?></label><input type="text" name='amount1' id="amount1" required>
				</div>
				<div class ="input-box">
					<label><?= _('Cash') ?></label><input type="radio" name='deposit' id="cash1" required>
				</div>
				<div class ="input-box">
					<label><?= _('Interac') ?></label><input type="radio" name='deposit' id="interac1" required>
				</div>
				<div class ="input-box">
					<label><?= _('E-Transfer') ?></label><input type="radio" name='deposit' id="e-transfer1" required>
				</div>
				<div class ="input-box">
					<label><?= _('Select the user:') ?></label><select name='user_id1'>
					<?php
					foreach ($data as $user) {
						echo "<option value='$user->user_id'>$user->username</option>\n";
					}
					?>
					</select><br>
				</div>
				<label><?=_('Balance')?>:</label>
				<div class ="input-box">
					<label></label><input type="text" name='date2' id="date2" required>
				</div>
				<div class ="input-box">
					<label></label><input type="text" name='amount2' id="amount2" required>
				</div>
				<div class ="input-box">
					<label></label><input type="radio" name='balance' id="cash2" required>
				</div>
				<div class ="input-box">
					<label></label><input type="radio" name='balance' id="interac2" required>
				</div>
				<div class ="input-box">
					<label></label><input type="radio" name='balance' id="e-transfer2" required>
				</div>
				<div class ="input-box">
					<label><?= _('Select the user:') ?></label><select name='user_id2'>
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