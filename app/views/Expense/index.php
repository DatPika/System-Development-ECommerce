<?php $this->view('shared/header',_('Expense Table')); ?>

<table>
	<tr><th><?= _('Supplier name') ?></th><th><?= _('Details') ?></th><th><?= _('Expense') ?></th><th><?= _('Actions') ?></th></tr>
<?php
foreach ($data as $expense) { ?>
	<tr><td><?= htmlentities($expense->supplierName) ?></td>
		<td><?= htmlentities($expense->details) ?></td>
		<td><?= htmlentities($expense->totalExpense) ?></td>
		<td><a href='/Expense/delete/<?=$expense->expense_id?>'><?= _('delete') ?></a> | 
			<a href='/Expense/edit/<?=$expense->expense_id?>'><?= _('edit') ?></a>  
<?php

}
?>
</table>

<?php $this->view('shared/footer'); ?>