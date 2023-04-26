<?php $this->view('shared/header',_('Expense Table')); ?>

<div class="createPage">
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
			<td><a href='/Expense/delete/<?=$expense->expense_id?>'><?= _('delete') ?></a> | <a href='/Expense/edit/<?=$expense->expense_id?>'><?= _('edit') ?></a>
		</tr>
	</tbody>

<?php
}
?>

</table>
</div>

<?php $this->view('shared/footer'); ?>