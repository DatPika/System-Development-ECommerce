<?php $this->view('shared/header',_('List of service appointments for the client')); ?>

<?php $this->view('Client/detailsPartial', $data);?> 

<a href='/Service/create/<?= $data->client_id ?>'><?= _('Create a new Service appointment')?></a>
<table>
	<tr><th><?= _('Date and Time')?></th><th><?= _('Description')?></th><th><?= _('Location');?></th><th><?= _('actions')?></th></tr>
<?php

$services = $data->getServices();
//$data is a client
foreach ($services as $service) { ?>
	<tr><td><?= \app\core\TimeHelper::DTOutput($service->datetime) ?></td>
		<td><?= $service->description ?></td>
		<td><?= $service->name ?></td>
		<td><a href='/Service/delete/<?=$service->service_id?>'><?= _('Delete')?></a> | 
			<a href='/Service/edit/<?=$service->service_id?>'><?= _('Edit')?></a>
		</td></tr>
<?php

}
?>
</table>
<?php $this->view('shared/footer'); ?>