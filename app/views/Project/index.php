<?php $this->view('shared/header',_('Expense Table')); ?>
<div class="createPage">
<table class="content-table">
	<thead>
		<tr>
			<th><?= _('Client Name') ?></th>
			<th><?= _('Start Date') ?></th>
			<th><?= _('End Date') ?></th>
			<th><?= _('Job') ?></th>
			<th><?= _('Surface Area') ?></th>
			<th><?= _('Lights') ?></th>
			<th><?= _('Spots') ?></th>
			<th><?= _('Vents') ?></th>
			<th><?= _('Works') ?></th>
			<th><?= _('Project Cost') ?></th>
			<th><?= _('Other') ?></th>
			<th><?= _('Actions') ?></th>
		</tr>
	</thead>
<?php
foreach ($data as $project) { ?>
	<tbody>
		<tr>
			<td><?= htmlentities($project->client_id) ?></td>
			<td><?= htmlentities($project->startDate) ?></td>
			<td><?= htmlentities($project->endDate) ?></td>
			<td><?= htmlentities($project->job) ?></td>
			<td><?= htmlentities($project->surfaceArea) ?></td>
			<td><?= htmlentities($project->lights) ?></td>
			<td><?= htmlentities($project->spots) ?></td>
			<td><?= htmlentities($project->vents) ?></td>
			<td><?= htmlentities($project->works) ?></td>
			<td><?= htmlentities($project->projectCost) ?></td>
			<td><?= htmlentities($project->other) ?></td>
			<td><a href='/Project/delete/<?=$project->project_id?>'><?= _('delete') ?></a> | <a href='/Project/edit/<?=$project->project_id?>'><?= _('edit') ?></a>
		</tr>
	</tbody>
<?php
}
?>
</div>
</table>

<?php $this->view('shared/footer'); ?>