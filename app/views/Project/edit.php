<?php $this->view('shared/header',_('Edit Project')); ?>

<figure class="back hover-underline-animation" onclick="history.back()">
	 <img src="/images/back-arrow.png" alt="Go Back">
	 <figcaption><?=_('Back')?></figcaption>
</figure>
<div class="createPage">

	<div class="container">

		<h1 class="form-title"><?= _('Edit project')?></h1>
		<form method="post" action="">
			<div class="project-info">
				<div class="general-info">
					<div>
						<label><?= _('Client Name:') ?></label>
						<input type="text" name="client" class="text-field" placeholder="<?= _('Client Name') ?>" value="<?= $data->getClient()->clientName ?>">
					</div>
					<div class="renovation-type">
						<label><?= _('Job:') ?></label>
						<select name='job' class="job-type">
							<option value='Installation'>Installation</option>
							<option value='Service'>Service</option>
							<option value='Estimation'>Estimation</option>
						</select>
					</div>
					<div>
						<label><?= _('Address:') ?></label>
						<input type="text" name="address" class="text-field" placeholder="<?= _('Address') ?>" value="<?= $data->getClient()->address ?>">
					</div>
					<div>
						<label><?= _('Start Date:') ?></label>
						<input type="text" name="startDate" class="text-field" placeholder="<?= _('DD/MM/YYYY') ?>" value="<?= \app\core\TimeHelper::DTOutBrowser($data->startDate)?>">
					</div>
					<div>
						<label><?= _('End Date:') ?></label>
						<input type="text" name="endDate" class="text-field" placeholder="<?= _('DD/MM/YYYY') ?>" value="<?= ($data->endDate) ? \app\core\TimeHelper::DTOutBrowser($data->endDate) : "" ?>">
					</div>
					<div>
						<label><?= _('Surface Area:') ?></label>
						<input type="text" name="surfaceArea" class="text-field" placeholder="<?= _('Surface Area') ?>" value="<?= $data->surfaceArea ?>">
					</div>
					<div class="lights-spots">
						<div>
							<label><?= _('Lights:') ?></label>
							<input type="text" name="lights" class="text-field" placeholder="<?= _('Lights') ?>" value="<?= $data->lights ?>">
						</div>
						<div>
							<label><?= _('Spots:') ?></label>
							<input type="text" name="spots" class="text-field" placeholder="<?= _('Spots') ?>" value="<?= $data->spots ?>">
						</div>
					</div>
					<div>
						<label><?= _('Vents:') ?></label>
						<input type="text" name="vents" class="text-field" placeholder="<?= _('Vents') ?>" value="<?= $data->vents ?>">
					</div>
					<div>
						<label><?= _('Works:') ?></label>
						<input type="text" name="works" class="text-field" placeholder="<?= _('Works') ?>" value="<?= $data->works ?>">
					</div>
					<div>
						<label><?= _('Project Cost:') ?></label>
						<input type="text" name="projectCost" class="text-field" placeholder="<?= _('Project Cost') ?>" value="<?= $data->projectCost ?>">
					</div>
					<div class="is-done">
						<label><?= _('Done?') ?></label>
						<input type="radio" name="done">
					</div>
					<div>
						<label><?= _('Other:') ?></label>
						<input type="text" name="otherInformation" class="text-field" placeholder="<?= _('Other') ?>" value="<?= $data->otherInformation ?>">
					</div>
				</div>
			</div>
			<div class="form-submit-btn">
				<a style="margin-right: 100px;" class="redButton" href='/PaymentInformation/index/<?=$data->project_id?>'><?= _('View Payments') ?></a>
				<input type="submit" name="action" value='<?= _('Edit record') ?>'>
			</div>
		</form>
	</div>
</div>

<?php $this->view('shared/footer'); ?>