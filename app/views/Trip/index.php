<?php $this->view('shared/header',_('Trip Table')); ?>

<div class="createPage">
<table class="content-table">
	<thead>
		<tr>
			<th><?= _('Date') ?></th>
			<th><?= _('Address') ?></th>
			<th><?= _('Distance') ?></th>
			<th><?= _('Actions') ?></th>
		</tr>
	</thead>
<?php
foreach ($data as $trip) { ?>
	<tbody>
		<tr>
			<td><?= htmlentities($trip->getProject()->startDate)?><?php 
				if(!($trip->getProject()->job == "Estimation")) {
					echo ",".htmlentities($trip->getProject()->endDate);
				}
			?></td>
			<td><?= htmlentities($trip->getProject()->getClient()->address) ?></td>
			<td><?= htmlentities($trip->distance) ?></td>
			<td><a href='/Trip/edit/<?=$trip->trip_id?>'><?= _('Edit') ?></a> | <a href='/Trip/delete/<?=$trip->trip_id?>'><?= _('Delete') ?></a>
		</tr>
	</tbody>
<?php
}
?>

</table>
</div>

<?php $this->view('shared/footer'); ?>