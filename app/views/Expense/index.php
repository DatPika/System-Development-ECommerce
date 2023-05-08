<?php $this->view('shared/header',_('Expense Table')); ?>
 <figure class="back hover-underline-animation" onclick="history.back()">
	 <img src="/images/back-arrow.png" alt="Go Back">
	 <figcaption>Back</figcaption>
</figure>
<div class="createPage">
	<div class="pageHeader">
		<h2 class="title">Expense Table</h2>
		<div class="headerSearch">
			<input type="text" name="searchField" placeholder="<?= _('Search') ?>">
			<input type="submit" name="searchButton" class="redButton" value="Search">
		</div>
	</div>
	<table class="content-table">
		<thead>
			<tr>
				<th><?= _('Supplier name') ?></th>
				<th><?= _('Details') ?></th>
				<th><?= _('Expense') ?></th>
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
	<div class="break"></div>
	<input type="submit" class="redButton" name="loadMore" value="Load More">
</div>

<?php $this->view('shared/footer'); ?>