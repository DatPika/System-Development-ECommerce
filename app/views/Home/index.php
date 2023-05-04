<?php $this->view('shared/header',_('Expense Table')); ?>

<div class="createPage">
	<div class="pageHeader">
		<h2 class="title">Home</h2>
		<div class="headerSearch">
			<input type="text" name="searchField" placeholder=<?= _('Search') ?>>
			<input type="submit" name="searchButton" value="Search">
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
	foreach ($data as $expense) { ?>
		<tbody>
			<tr>
				<td><?= htmlentities($expense->supplierName) ?></td>
				<td><?= htmlentities($expense->details) ?></td>
				<td><?= htmlentities($expense->totalExpense) ?></td>
				<td><a href='/Expense/edit/<?=$expense->expense_id?>'><?= _('Edit') ?></a> | <a href='/Expense/delete/<?=$expense->expense_id?>'><?= _('Delete') ?></a>
			</tr>
		</tbody>

	<?php
	}
	?>

	</table>
</div>

<?php $this->view('shared/footer'); ?>