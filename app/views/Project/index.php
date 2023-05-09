<?php $this->view('shared/header',_('Project Table')); ?>
<figure class="back hover-underline-animation" onclick="history.back()">
	 <img src="/images/back-arrow.png" alt="Go Back">
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
					<td><?= htmlentities($project->getClient()->clientName) ?></td>
					<td>Project Cost: <?= htmlentities($project->projectCost) ?> / 
						<?= htmlentities($project->surfaceArea) ?> ft^2 / 
						<?= htmlentities($project->lights) ?> lights / 
						<?= htmlentities($project->spots) ?> spots / 
						<?= htmlentities($project->vents) ?> vents / 
						<?= htmlentities($project->works) ?> work / 
						<?= htmlentities($project->other) ?>
					</td>
					<td>
						<?php
							$payments = $project->getAllPayments();
							$profit = 0;
							foreach($payments as $payment) {
								$profit += $payment->amount;
							}
						?>
						<?= htmlentities($profit) ?>
					</td>
					<td><a href='/Project/Edit/<?=$project->project_id?>'><?= _('Edit') ?></a> | <a href='/Project/Delete/<?=$project->project_id?>'><?= _('Delete') ?></a> | <a href='/PaymentInformation/index/<?=$project->project_id?>'><?= _('View Payments') ?></a>
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