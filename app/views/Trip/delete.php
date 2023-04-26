<?php $this->view('shared/header',_('Delete Trip Record')); ?>


<div class="createPage">

	<div class="container">

		<h1 class="form-title"><?= _('Delete Trip')?></h1>
		<h2><?= _("Are you sure you want to delete this record?")?></h2>
		
		<form method="post" action="">

			<div class="info">
				<div class ="input-box">
					<label><?= _('Project') ?></label><input type="text" name="project" id="project" readonly="readonly"><?= $data->project_id?></textarea>
				</div>
				<div class ="input-box">
					<label><?= _('Distance') ?></label><input type="text" name='distance' id="distance" value="<?= $data->distance?>" readonly="readonly">
				</div>
			</div>
			<div class="form-submit-btn">
				<a href="/Trip/index"><?= _('Cancel') ?></a>
			</div>
			<div class="form-submit-btn">
				<input type="submit" name="action" value='<?= _('Delete record') ?>'>
			</div>
			
		</form>

	</div>

</div>

<?php $this->view('shared/footer'); ?>