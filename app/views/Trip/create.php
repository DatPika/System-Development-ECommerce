<?php $this->view('shared/header',_('Add Trip')); ?>

<figure class="back hover-underline-animation">
	<a href="/Trip/selectProject"><img src="/images/back-arrow.png" alt="Go Back"></a>
	<figcaption><?=_('Back')?></figcaption>
</figure>
	<div class="createPage">

		<div class="container">

			<h1 class="form-title"><?= _('Add Trip')?></h1>
			
			<form method="post" action="">

				<div class="trip-info">
					<div class ="input-box">
						<label><?= _('Project ID') ?></label>
						<input type="text" name="project_id" class="text-field" value="<?= $data->project_id?>"readonly>
					</div>
					<div class ="input-box">
						<label><?= _('Project') ?></label>
						<input type="text" name="project" class="text-field" value="<?= $data->getClient()->clientName?>, <?= $data->getClient()->address?>, <?= $data->job?>" readonly>
					</div>
					<div class ="input-box">
						<label><?= _('Distance') ?></label>
						<input type="text" name='distance' class="text-field" placeholder="<?=_('Distance')?>">
					</div>
				</div>
				<div class="form-submit-btn">
					<input type="submit" name="action" value='<?= _('Add Record') ?>'>
				</div>
				
			</form>

		</div>

	</div>

<?php $this->view('shared/footer'); ?>