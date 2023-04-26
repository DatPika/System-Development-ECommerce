<?php $this->view('shared/header',_('Add Project')); ?>

	<div class="createPage">

	<div class="container">

		<h1 class="form-title"><?= _('Add project')?></h1>
		
		<form method="post" action="">

			<div class="project-info">
				<div class ="input-box">
					<label><?= _('Start Date') ?></label><input type="text" name="client" id="clientName" required>
				</div>
				<div class ="input-box">
					<label><?= _('End Date') ?></label><input type="text" name="client" id="clientName" required>
				</div>
				<div class ="input-box">
					<label><?= _('Service') ?></label><input type="radio" name='job' id="cash" value="Service" required>
				</div>
				<div class ="input-box">
					<label><?= _('Installation') ?></label><input type="radio" name='job' id="interac"  value="Installation" required>
				</div>
				<div class ="input-box">
					<label><?= _('Estimation') ?></label><input type="radio" name='job' id="e-transfer"  value="Estimation" required>
				</div>
				<div class ="input-box">
					<label><?= _('Done') ?></label><input type="radio" name='done' id="done" required>
				</div>
				<div class ="input-box">
					<label><?= _('Not Done') ?></label><input type="radio" name='done' id="interac" required>
				</div>
				<div class ="input-box">
					<label><?= _('Client Name') ?></label><input type="text" name="client" id="clientName" required>
				</div>
				<div class ="input-box">
					<label><?= _('Address') ?></label><input type="text" name="address" id="address" required>
				</div>
				<div class ="input-box">
					<label><?= _('Surface Area') ?></label><textarea name="surfaceArea" id="surfaceArea"></textarea>
				</div>
				<div class ="input-box">
					<label><?= _('Lights') ?></label><input type="text" name='lights' id="lights" required>
				</div>
				<div class ="input-box">
					<label><?= _('Spots') ?></label><input type="text" name='spots' id="spots" required>
				</div>
				<div class ="input-box">
					<label><?= _('Vents') ?></label><input type="text" name='vents' id="vents" required>
				</div>
				<div class ="input-box">
					<label><?= _('Works') ?></label><input type="text" name='works' id="works" required>
				</div>
				<div class ="input-box">
					<label><?= _('Other') ?></label><input type="text" name='other' id="other" required>
				</div>
				<label>Deposit:</label>
				<div class ="input-box">
					<label><?= _('Date') ?></label><input type="text" name='date' id="date" required>
				</div>
				<div class ="input-box">
					<label><?= _('Amount') ?></label><input type="text" name='amount' id="amonut" required>
				</div>
				<div class ="input-box">
					<label><?= _('Cash') ?></label><input type="radio" name='deposit' id="cash" required>
				</div>
				<div class ="input-box">
					<label><?= _('Interac') ?></label><input type="radio" name='deposit' id="interac" required>
				</div>
				<div class ="input-box">
					<label><?= _('E-Transfer') ?></label><input type="radio" name='deposit' id="e-transfer" required>
				</div>
				<!--<label>Balance:</label>
				<div class ="input-box">
					<label></label><input type="text" name='date' id="date" required>
				</div>
				<div class ="input-box">
					<label></label><input type="text" name='amount' id="amonut" required>
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
			</div>
-->
			<div class="form-submit-btn">
				<input type="submit" name="action" value='<?= _('Add record') ?>'>
			</div>
			
		</form>

	</div>

</div>

<?php $this->view('shared/footer'); ?>