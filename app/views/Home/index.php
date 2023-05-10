<?php $this->view('shared/header',_('Expense Table')); ?>

<figure class="back hover-underline-animation" onclick="history.back()">
	<img src="/images/back-arrow.png" alt="Go Back">
	<figcaption><?=_('Back')?></figcaption>
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
			<input type="text" name="searchField" placeholder="<?= _('Search') ?>">
			<input type="submit" name="searchButton" class="redButton" value="Search">
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
		if($record->project_id == null) {
		?>
		<tbody>
			<tr>
				<td><?= htmlentities($record->getExpense()->supplierName) ?></td>
				<td><?= htmlentities($record->getExpense()->details) ?></td>
				<td><?= htmlentities($record->getExpense()->totalExpense) ?></td>
				<td><a href='/Expense/edit/<?=$record->getExpense()->expense_id?>'><?= _('Edit') ?></a> | <a href='/Expense/delete/<?=$record->getExpense()->expense_id?>'><?= _('Delete') ?></a>
			</tr>
		</tbody>

	<?php
		}
	}
	?>

	</table>
</div>

<?php $this->view('shared/footer'); ?>