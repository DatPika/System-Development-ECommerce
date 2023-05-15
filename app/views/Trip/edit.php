<?php $this->view('shared/header',_('Edit Trip')); ?>

<figure class="back hover-underline-animation">
<a href="/Trip/index"><img src="/images/back-arrow.png" alt="Go Back"></a>
	<figcaption><?=_('Back')?></figcaption>
</figure>
	<div class="createPage">

		<div class="container">


			<h1 class="form-title"><?= _('Edit Trip')?></h1>
			
			<form method="post" action="">

				<div class="trip-info">
					<div class ="input-box">
						<label><?= _('Project ID') ?></label>
						<input type="text" name="project_id" class="text-field" value="<?= $data->project_id?>" readonly>
					</div>
					<div class ="input-box">
						<label><?= _('Project') ?></label>
						<input type="text" name="project" class="text-field" value="<?= $data->getProject()->getClient()->clientName?>, <?= $data->getProject()->getClient()->address?>, <?= $data->getProject()->job?>" readonly>
					</div>
					<div class ="input-box">
						<label><?= _('Distance') ?></label>
						<input type="text" name='distance' class="text-field" placeholder="<?=_('Distance')?>" value="<?=$data->distance?>"><!--<label>km</label> -->
					</div>
				</div>
				<div class="form-submit-btn">
					<input type="submit" name="action" value='<?= _('Edit Record') ?>'>
				</div>
				
			</form>

		</div>

	</div>

<?php $this->view('shared/footer'); ?>