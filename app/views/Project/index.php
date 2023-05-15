<?php $this->view('shared/header',_('Project Table')); ?>
<figure class="back hover-underline-animation">
	 <a href="/Home/index"><img src="/images/back-arrow.png" alt="Go Back"></a>
	 <figcaption><?=_('Back')?></figcaption>
</figure>
<div class="createPage">
	<div class="pageHeader">
		<h2 class="title"><?=_('Project Table')?></h2>
		<div class="headerSearch">
			<input type="text" name="searchField" placeholder="<?= _('Search') ?>">
			<input type="submit" name="searchButton" class="redButton" value="<?= _('Search') ?>">
		</div>
	</div>
	<table class="content-table">
		<thead>
			<tr>
				<!-- Implement info for payment into the table depends on the design-->
				<th><?= _('Client Name') ?></th>
				<th><?= _('Details') ?></th>
				<th><?= _('Profit') ?></th>
				<th><?= _('Actions') ?></th>
			</tr>
		</thead>
		<?php
		foreach ($data as $project) { ?>
			<tbody>
				<tr>
					<td><?= $project->getClient()->clientName ?></td>
					<td>Project Cost: <?= $project->projectCost ?> / 
						<?= $project->surfaceArea ?> ft^2 / 
						<?= $project->lights ?> lights / 
						<?= $project->spots ?> spots / 
						<?= $project->vents ?> vents / 
						<?= $project->works ?> work / 
						<?= $project->otherInformation ?>
					</td>
					<td>
						<?php
							$payments = $project->getAllPayments();
							$profit = 0;
							foreach($payments as $payment) {
								$profit += $payment->amount;
							}
						?>
						<?= htmlentities($profit) ?>$
					</td>
					<td><a href='/Project/edit/<?=$project->project_id?>'><?= _('Edit') ?></a> | <a href='/Project/delete/<?=$project->project_id?>'><?= _('Delete') ?></a> | <a href='/PaymentInformation/index/<?=$project->project_id?>'><?= _('View Payments') ?></a>
				</tr>
			</tbody>
		<?php
		}
		?>
	</table>
	<div class="break"></div>
	<input type="submit" class="redButton" name="loadMore" value="<?=_('Load More')?>">
</div>

<?php $this->view('shared/footer'); ?>