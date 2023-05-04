<?php $this->view('shared/header',_('Select Project')); ?>
	<form method="post">
		
		<?php foreach($data as $project) {?>
			<input type="radio" name="project_id" value="<?= $project->project_id ?>">
			<?= $project->getClient()->clientName ?>,
			<?= $project->getClient()->address ?>,
			<?= $project->job ?>
		<?php 
		}
		?>
		<div class="form-submit-btn">
				<input type="submit" name="action" value='<?= _('Select Project') ?>'>
		</div>

	</form>
		


<?php $this->view('shared/footer'); ?>