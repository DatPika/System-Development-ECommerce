<?php $this->view('shared/header',_('Delete Project Record')); ?>


<div class="createPage">

	<div class="container">

		<h1 class="form-title"><?= _('Delete Project')?></h1>
		<h2><?= _("Are your sure you want to delete this record?")?></h2>
		
		<form method="post" action="">

		<!-- TODO: implement an input box for user id/username and transfer the values of payment information-->
			<div class="project-info">
				<div class ="input-box">
					<label><?= _('Start Date') ?></label><input type="text" name="startDate" id="clientName" value="<?= $data->startDate?>"required>
				</div>
				<div class ="input-box">
					<label><?= _('End Date') ?></label><input type="text" name="endDate" id="clientName" value="<?= $data->endDate?>">
				</div>
				<div class ="input-box">
					<label><?= _('Service') ?></label><input type="radio" name='job' id="cash" value="Service" required <?= ($data->job == 'Service') ? "checked" : "" ?>>
				</div>
				<div class ="input-box">
					<label><?= _('Installation') ?></label><input type="radio" name='job' id="interac"  value="Installation" required <?= ($data->job == 'Installation') ? "checked" : "" ?>>
				</div>
				<div class ="input-box">
					<label><?= _('Estimation') ?></label><input type="radio" name='job' id="e-transfer"  value="Estimation" required <?= ($data->job == 'Estimation') ? "checked" : "" ?>>
				</div>
				<div class ="input-box">
					<label><?= _('Done') ?></label><input type="checkbox" name='done' id="done" required <?= ($data->job == 'Done') ? "checked" : "" ?>>
				</div>
				<div class ="input-box">
					<label><?= _('Client Name') ?></label><input type="text" name="client" id="clientName" value="<?= $data->client_id?>" required>
				</div>
				<div class ="input-box">
					<label><?= _('Address') ?></label><input type="text" name="address" id="address" value="<?= $data->client_id?>" required>
				</div>
				<div class ="input-box">
					<label><?= _('Surface Area') ?></label><textarea name="surfaceArea" id="surfaceArea"><?= $data->surfaceArea?></textarea>
				</div>
				<div class ="input-box">
					<label><?= _('Project Cost') ?></label><input type="text" name="projectCost" id="projectCost" value="<?= $data->projectCost?>">
				</div>
				<div class ="input-box">
					<label><?= _('Lights') ?></label><input type="text" name='lights' id="lights" value="<?= $data->lights?>" required>
				</div>
				<div class ="input-box">
					<label><?= _('Spots') ?></label><input type="text" name='spots' id="spots" value="<?= $data->spots?>" required>
				</div>
				<div class ="input-box">
					<label><?= _('Vents') ?></label><input type="text" name='vents' id="vents" value="<?= $data->vents?>"required>
				</div>
				<div class ="input-box">
					<label><?= _('Works') ?></label><input type="text" name='works' id="works" value="<?= $data->works?>"required>
				</div>
				<div class ="input-box">
					<label><?= _('Other') ?></label><input type="text" name='otherInformation' id="other" value="<?= $data->otherInformation?>" required>
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