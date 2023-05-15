<?php $this->view('shared/header',_('Add Project')); ?>
<figure class="back hover-underline-animation">
	<a href="/Home/index"><img src="/images/back-arrow.png" alt="Go Back"></a>
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
						<input type="text" name="client" class="text-field" placeholder="<?= _('Client Name') ?>">
					</div>
					<div class="renovation-type">
						<label><?= _('Job:') ?></label>
						<select name='job' class="job-type">
							<option value='Installation'><?=_('Installation')?></option>
							<option value='Service'><?=_('Service')?></option>
							<option value='Estimation'><?=_('Estimation')?></option>
						</select>
					</div>
					<div>
						<label><?= _('Address:') ?></label>
						<input type="text" name="address" class="text-field" placeholder="<?= _('Address') ?>">
					</div>
					<div>
						<label><?= _('Start Date:') ?></label>
						<input type="date" name="startDate" class="text-field">
					</div>
					<div>
						<label><?= _('End Date:') ?></label>
						<input type="date" name="endDate" class="text-field">
					</div>
					<div>
						<label><?= _('Surface Area:') ?></label>
						<input type="text" name="surfaceArea" class="text-field" placeholder="<?= _('Surface Area') ?>">
					</div>
					<div class="lights-spots">
						<div>
							<label><?= _('Lights:') ?></label>
							<input type="text" name="lights" class="text-field" placeholder="<?= _('Lights') ?>">
						</div>
						<div>
							<label><?= _('Spots:') ?></label>
							<input type="text" name="spots" class="text-field" placeholder="<?= _('Spots') ?>">
						</div>
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
						<input type="text" name="projectCost" class="text-field" placeholder="<?= _('Project Cost') ?>">
					</div>
					<div class="is-done">
						<label><?= _('Done?') ?></label>
						<input type="checkbox" name="done" value="Done">
					</div>
					<div>
						<label><?= _('Other:') ?></label>
						<input type="text" name="otherInformation" class="text-field" placeholder="<?= _('Other') ?>">
					</div>
				</div>
				<div class="payment-info">
					<div class="payment">
						<label><?=_('Deposit')?>:</label>
						<div class="bottom">
							<div class="left">
								<div class="input-box">
									<label><?= _('Date:') ?></label>
									<input type="date" name="date1" class="text-field">
								</div>
								<div class="input-box">
									<label><?= _('Amount:') ?></label>
									<input type="text" name="amount1" class="text-field" placeholder="<?= _('Amount') ?>">
								</div>
								<div class="input-box">
									<label><?= _('Select the user:') ?></label>
									<select name="user_id1">
									<?php
									foreach ($data as $user) {
										echo "<option value='$user->user_id'";
										echo ($user->user_id == $_SESSION['user_id']?'selected':''); 
										echo ">$user->username</option>\n";
									}
									?>
									</select>
								</div>
							</div>
							<div class="right">
								<label><?= _('Payment Method:') ?></label>
								<div class="input-box">
									<label><?= _('Cash') ?></label>
									<input type="radio" name="deposit" value="cash">
								</div>
								<div class="input-box">
									<label><?= _('Interac') ?></label>
									<input type="radio" name="deposit" value="interac">
								</div>
								<div class="input-box">
									<label><?= _('E-Transfer') ?></label>
									<input type="radio" name="deposit" value="e-transfer">
								</div>
							</div>
						</div>
					</div>
					<div class="payment">
						<label><?=_('Balance')?>:</label>
						<div class="bottom">
							<div class="left">
								<div class="input-box">
									<label><?= _('Date:') ?></label>
									<input type="date" name="date2" class="text-field">
								</div>
								<div class="input-box">
									<label><?= _('Amount:') ?></label>
									<input type="text" name="amount2" class="text-field" placeholder="<?= _('Amount') ?>">
								</div>
								<div class="input-box">
									<label><?= _('Select the user:') ?></label>
									<select name="user_id2">
									<?php
									foreach ($data as $user) {
										echo "<option value='$user->user_id'";
										echo ($user->user_id == $_SESSION['user_id']?'selected':''); 
										echo ">$user->username</option>\n";
									}
									?>
									</select>
								</div>
							</div>
							<div class="right">
								<label><?= _('Payment Method:') ?></label>
								<div class="input-box">
									<label><?= _('Cash') ?></label>
									<input type="radio" name="balance" value="cash">
								</div>
								<div class="input-box">
									<label><?= _('Interac') ?></label>
									<input type="radio" name="balance" value="interac">
								</div>
								<div class="input-box">
									<label><?= _('E-Transfer') ?></label>
									<input type="radio" name="balance" value="e-transfer">
								</div>
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