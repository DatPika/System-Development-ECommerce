<?php $this->view('shared/header',_('Payment Information Table')); ?>
 <figure class="back hover-underline-animation">
 <a href="/Project/index"><img src="/images/back-arrow.png" alt="Go Back"></a>
	 <figcaption><?=_('Back')?></figcaption>
</figure>
<div class="createPage">
	<div class="pageHeader">
		<h2 class="title"><?=_('Payment Information Table')?></h2>
		<div class="headerSearch">
			<input type="text" name="searchField" placeholder="<?= _('Search') ?>">
			<input type="submit" name="searchButton" class="redButton" value="<?= _('Search') ?>">
		</div>
	</div>
	<table class="content-table">
		<thead>
			<tr>
				<th><?= _('Payment Method') ?></th>
				<th><?= _('Amount') ?></th>
				<th><?= _('Date') ?></th>
				<th><?= _('Actions') ?></th>
			</tr>
		</thead>
	<?php
	foreach ($data[0] as $payment) { ?>
		<tbody>
			<tr>
				<td><?= htmlentities($payment->paymentMethod) ?></td>
				<td><?= htmlentities($payment->amount) ?></td>
				<td><?= \app\core\TimeHelper::DTOutBrowser($payment->date) ?></td>
				<td><a href='/PaymentInformation/edit/<?=$payment->payment_id?>'><?= _('Edit') ?></a> | <a href='/PaymentInformation/delete/<?=$payment->payment_id?>'><?= _('Delete') ?></a>
			</tr>
		</tbody>

	<?php
	}
	?>

	</table>
	<div class="break"></div>
	<a style="margin-bottom: 20px;" class="redButton" href="/PaymentInformation/create/<?=$data[1]?>"><?=_('Add New Payment')?></a>
	<div class="break"></div>
	<input type="submit" class="redButton" name="loadMore" value="<?=_('Load More')?>">
</div>

<?php $this->view('shared/footer'); ?>