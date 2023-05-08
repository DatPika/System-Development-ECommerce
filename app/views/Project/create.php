<?php $this->view('shared/header',_('Add Project')); ?>
<figure class="back hover-underline-animation" onclick="history.back()">
	 <img src="/images/back-arrow.png" alt="Go Back">
	 <figcaption><?=_('Back')?></figcaption>
</figure>
<div class="createPage">

	<div class="container">

		<h1 class="form-title"><?= _('Add project')?></h1>
		
		<form method="post" action="">
			<div class="project-info">
				<div class="general-info">
					<div>
						<label><?= _('Client Name:') ?></label>
						<input type="text" name="client-name" class="text-field" placeholder="<?= _('Client Name') ?>">
					</div>
					<div>
						<label><?= _('Surface Area:') ?></label>
						<input type="text" name="surface-area" class="text-field" placeholder="<?= _('Surface Area') ?>">
					</div>
					<div>
						<label><?= _('Lights:') ?></label>
						<input type="text" name="lights" class="text-field" placeholder="<?= _('Lights') ?>">
					</div>
					<div>
						<label><?= _('Spots:') ?></label>
						<input type="text" name="spots" class="text-field" placeholder="<?= _('Spots') ?>">
					</div>
					<div>
						<label><?= _('Vents:') ?></label>
						<input type="text" name="vents" class="text-field" placeholder="<?= _('Vents') ?>">
					</div>
					<div>
						<label><?= _('Works:') ?></label>
						<input type="text" name="works" class="text-field" placeholder="<?= _('Works') ?>">
					</div>
					<div>
						<label><?= _('Project Cost:') ?></label>
						<input type="text" name="project-cost" class="text-field" placeholder="<?= _('Project Cost') ?>">
					</div>
					<div class="renovation-type">
						<label><?= _('Renovation Type:') ?></label>
						<select name='renovation-type'>
							<option value='Installation'>Installation</option>
							<option value='Service'>Service</option>
						</select>
					</div>
					<div>
						<label><?= _('Start Date:') ?></label>
						<input type="text" name="start-date" class="text-field" placeholder="<?= _('Start Date') ?>">
					</div>
					<div>
						<label><?= _('End Date:') ?></label>
						<input type="text" name="end-date" class="text-field" placeholder="<?= _('End Date') ?>">
					</div>
					<div class="is-done">
						<label><?= _('Done?') ?></label>
						<input type="radio" name="end-date">
					</div>
					<div>
						<label><?= _('Other:') ?></label>
						<input type="text" name="other" class="text-field" placeholder="<?= _('Other') ?>">
					</div>
				</div>
				<div class="payment-info">
					<div class="payment">
						<label><?=_('Deposit')?>:</label>
						<div class="bottom">
							<div class="left">
								<div>
									<label><?= _('Date:') ?></label>
									<input type="text" name="deposit" class="text-field" placeholder="<?= _('Date') ?>">
								</div>
								<div>
									<label><?= _('Amount:') ?></label>
									<input type="text" name="amount" class="text-field" placeholder="<?= _('Amount') ?>">
								</div>
								<div>
									<label><?= _('Select the user:') ?></label><select>
									<?php
									foreach ($data as $user) {
										echo "<option value='$user->user_id'";
										echo ($user->user_id == $_SESSION['user_id']?'selected':''); 
										echo ">$user->username</option>\n";
									}
									?>
									</select><br>
								</div>
							</div>
							<div class="right">
								<label><?= _('Payment Method:') ?></label>
								<div>
									<label><?= _('Cash') ?></label>
									<input type="radio" name="payment1">
								</div>
								<div>
									<label><?= _('Interac') ?></label>
									<input type="radio" name="payment1">
								</div>
								<div>
									<label><?= _('E-Transfer') ?></label>
									<input type="radio" name="payment1">
								</div>
							</div>
						</div>
					</div>
					<div class="payment">
						<label><?=_('Balance')?>:</label>
						<div>
							<div class ="input-box">
								<label></label><input type="text" required>
							</div>
							<div class ="input-box">
								<label></label><input type="text" required>
							</div>
							<div class ="input-box">
								<label></label><input type="radio" required>
							</div>
							<div class ="input-box">
								<label></label><input type="radio" required>
							</div>
							<div class ="input-box">
								<label></label><input type="radio" required>
							</div>
							<div class ="input-box">
								<label><?= _('Select the user:') ?></label><select>
								<?php
								foreach ($data as $user) {
									echo "<option value='$user->user_id'";
										echo ($user->user_id == $_SESSION['user_id']?'selected':''); 
										echo ">$user->username</option>\n";
								}
								?>
								</select><br>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="form-submit-btn">
				<input type="submit" name="action" value='<?= _('Add record') ?>'>
			</div>
			
		</form>

	</div>

</div>

<?php $this->view('shared/footer'); ?>