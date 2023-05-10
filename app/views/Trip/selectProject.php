<?php $this->view('shared/header',_('Select Project')); ?>

<figure class="back hover-underline-animation" onclick="history.back()">
	<img src="/images/back-arrow.png" alt="Go Back">
	<figcaption><?=_('Back')?></figcaption>
</figure>
<div class="createPage">
	<div class="container">
		<h1 class="form-title"><?= _('Select a project')?></h1>
		<form method="post">
			<div class="project-select">
				<?php foreach($data as $project) {?>
				<input type="radio" name="project_id" value="<?= $project->project_id ?>">
				<?= $project->getClient()->clientName ?>,
				<?= $project->getClient()->address ?>,
				<?= $project->job ?>
				<?php 
				}
				?>
			</div>
			<div class="form-submit-btn">
					<input type="submit" name="action" value='<?= _('Select Project') ?>'>
			</div>
		</form>
	</div>
</div>	

<?php $this->view('shared/footer'); ?>