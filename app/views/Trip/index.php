<?php $this->view('shared/header',_('Trip Table')); ?>

 <figure class="back hover-underline-animation" onclick="history.back()">
	 <img src="/images/back-arrow.png" alt="Go Back">
	 <figcaption><?=_('Back')?></figcaption>
</figure>
<div class="createPage">
	<div class="pageHeader">
		<h2 class="title"><?=_('Trip Table')?></h2>
		<div class="headerSearch">
			<input type="text" name="searchField" placeholder="<?= _('Search') ?>">
			<input type="submit" name="searchButton" class="redButton" value="<?= _('Search') ?>">
		</div>
	</div>
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
					if($trip->getProject()->endDate && $trip->getProject()->job != "Estimation") {
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