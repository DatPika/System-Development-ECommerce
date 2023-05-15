<?php $this->view('shared/header',_('Home Page')); ?>

<figure class="back hover-underline-animation">
	<a href="/User/logout"><img src="/images/back-arrow.png" alt="Go Back"></a>
	<figcaption><?=_('Logout')?></figcaption>
</figure>
<div class="createPage">
	<div class="pageHeaderHome">
		<div class="project">
			<h2><?=_('Project')?></h2>
			<a class="redButton" href="/Project/index"><?=_('View')?></a>
			<a class="redButton" href="/Project/create"><?=_('Add')?></a>
		</div>
		<div class="expenses">
			<h2><?=_('Expenses')?></h2>
			<a class="redButton" href="/Expense/index"><?=_('View')?></a>
			<a class="redButton" href="/Expense/create"><?=_('Add')?></a>
		</div>
		<div class="trips">
			<h2><?=_('Trips')?></h2>
			<a class="redButton" href="/Trip/index"><?=_('View')?></a>
			<a class="redButton" href="/Trip/selectProject"><?=_('Add')?></a>
		</div>
		<div class="search">
			<input type="text" name="searchField" id="searchField" placeholder="<?= _('Search') ?>">
			<input type="button" id="searchButton" name="search" class="redButton" value="Search">
		</div>
		<div class="2fa">
		<h2><?=_('2FA')?></h2>
			<a class="redButton" href="/User/setup2fa"><?=_('Set up')?></a>
		</div>
	</div>
	<table class="content-table">
		<thead>
			<tr>
				<th><?= _('Supplier/Client Name') ?></th>
				<th><?= _('Details') ?></th>
				<th><?= _('Expense/Profit') ?></th>
				<th><?= _('Actions') ?></th>
			</tr>
		</thead>
	<?php
	foreach ($data as $record) {
		if($record->project_id == null && $record->expense_id) {
		?>
		<tbody>
			<tr>
				<td><?= $record->getExpense()->supplierName ?></td>
				<td><?= $record->getExpense()->details ?></td>
				<td><?= $record->getExpense()->totalExpense ?></td>
				<td><a href='/Expense/edit/<?=$record->getExpense()->expense_id?>'><?= _('Edit') ?></a> | <a href='/Expense/delete/<?=$record->getExpense()->expense_id?>'><?= _('Delete') ?></a>
			</tr>
		</tbody>

	<?php
		}
		else if($record->expense_id == null && $record->project_id) { ?>
			<tbody>
				<tr>
					<td><?= $record->getProject()->getClient()->clientName ?></td>
					<td><?= _('Project Cost: ') ?><?= $record->getProject()->projectCost ?> / 
						<?= $record->getProject()->surfaceArea ?> ft^2 / 
						<?= $record->getProject()->lights ?> <?= _('lights')?> / 
						<?= $record->getProject()->spots ?> <?= _('spots')?> / 
						<?= $record->getProject()->vents ?> vents / 
						<?= $record->getProject()->works ?> work / 
						<?= $record->getProject()->otherInformation ?>
					</td>
					<td><?= $record->getProject()->projectCost ?></td>
					<td><a href='/Project/edit/<?=$record->getProject()->project_id?>'><?= _('Edit') ?></a> | <a href='/Project/delete/<?=$record->getProject()->project_id?>'><?= _('Delete') ?></a>
				</tr>
			</tbody>

		<?php }
	}
	?>

	</table>
</div>

<?php $this->view('shared/footer'); ?>