<?php $this->view('shared/header',_('Add Trip')); ?>



	<div class="createPage">

		<div class="container">

			<h1 class="form-title"><?= _('Add Trip')?></h1>
			
			<form method="post" action="">

				<div class="info">
					<div class ="input-box">
						<label><?= _('Project ID') ?></label><input type="text" name="project_id" id="project_id" value="<?= $data->project_id?>" readonly>
					</div>
					<div class ="input-box">
						<label><?= _('Project') ?></label><input type="text" name="project" id="projectDetails" value="<?= $data->getClient()->clientName?>, <?= $data->getClient()->address?>, <?= $data->job?>" readonly>
					</div>
					<div class ="input-box">
						<label><?= _('Distance') ?></label><input type="text" name='distance' id="distance" required>
					</div>
				</div>
				<div class="form-submit-btn">
					<input type="submit" name="action" value='<?= _('Add Record') ?>'>
				</div>
				
			</form>

		</div>

	</div>




<?php $this->view('shared/footer'); ?>