<?php $this->view('shared/header',_('Expense Table')); ?>

<table class="content-table">
	<thead>
		<tr>
			<th><?= _('Client name') ?></th>
			<th><?= _('Details') ?></th>
			<th><?= _('Profit') ?></th>
			<th><?= _('Actions') ?></th>
		</tr>
	</thead>
<?php
foreach ($data as $project) { ?>
	<tbody>
		<tr>
			<td><?= htmlentities($project->supplierName) ?></td>
			<td><?= htmlentities($project->other) ?></td>
			<td><?= htmlentities($project->profit) ?></td>
			<td><a href='/Expense/delete/<?=$project->projectproject_id?>'><?= _('delete') ?></a> | <a href='/Expense/edit/<?=$project->expense_id?>'><?= _('edit') ?></a>
		</tr>
	</tbody>

<?php
}
?>

</table>

<?php $this->view('shared/footer'); ?>