<?php $this->view('shared/header', _('Delete a service appointment')); ?>

<p>Do you want to delete the service appointment presented on the screen?</p>

<?php 
$client = $data->getClient();
$this->view('Client/detailsPartial', $client);?>
<?php $this->view('Service/detailsPartial', $data);?> 

<form method="post" action="">
	<input type="submit" name="action" value='<?= _('Delete')?>'>
	<a href="/Service/index/<?= $data->client_id?>"><?= _('Cancel')?></a>
</form>

<?php $this->view('shared/footer'); ?>