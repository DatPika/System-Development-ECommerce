<?php $this->view('shared/header',_('Trip Table')); ?>

<div class="createPage">
<table class="content-table">
	<thead>
		<tr>
			<th><?= _('Client') ?></th>
			<th><?= _('Project') ?></th>
			<th><?= _('Distance') ?></th>
			<th><?= _('Actions') ?></th>
		</tr>
	</thead>
<?php
foreach ($data as $trip) { ?>
	<tbody>
		<tr>
			<td><?= htmlentities($trip->project_id) ?></td>
			<td><?= htmlentities($trip->client_id) ?></td>
			<td><?= htmlentities($trip->distance) ?></td>
			<td><a href='/Trip/delete/<?=$trip->trip_id?>'><?= _('delete') ?></a> | <a href='/Trip/edit/<?=$trip->trip_id?>'><?= _('edit') ?></a>
		</tr>
	</tbody>
<?php
}
?>

</table>
</div>

<?php $this->view('shared/footer'); ?>