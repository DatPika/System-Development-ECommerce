<?php $this->view('shared/header',_('Edit Trip')); ?>


<div class="createPage">

	<div class="container">

		<h1 class="form-title"><?= _('Edit Trip')?></h1>
		
		<form method="post" action="">

			<div class="info">
				<div class ="input-box">
					<label><?= _('Project') ?></label><input type="text" name="project" id="project" value="<?= $data->project_id?>" required>
				</div>
				<div class ="input-box">
					<label><?= _('Distance') ?></label><input type="text" name='distance' id="distance" value="<?= $data->distance?>" required>
				</div>
			</div>
			<div class="form-submit-btn">
				<input type="submit" name="action" value='<?= _('Edit Record') ?>'>
			</div>
		</form>
	</div>
</div>

<?php $this->view('shared/footer'); ?>