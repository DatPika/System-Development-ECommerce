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
			<td><?= htmlentities($project->clientName) ?></td>
			<td><?= htmlentities($project->other) ?></td>
			<td><?= htmlentities($project->profit) ?></td>
			<td><a href='/Expense/delete/<?=$project->projectproject_id?>'><?= _('delete') ?></a> | <a href='/Expense/edit/<?=$project->expense_id?>'><?= _('edit') ?></a>
		</tr>
	</tbody>
<?php
}
?>
</div>
</table>

<?php $this->view('shared/footer'); ?>