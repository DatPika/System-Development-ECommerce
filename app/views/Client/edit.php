<?php $this->view('shared/header', _('Edit a client record')); ?>

<form method="post" action="">
	<label><?= _('First name:')?></label><input type="text" name="first_name" value="<?= $data->first_name ?>"><br>
	<label><?= _('Last name:')?></label><input type="text" name="last_name" value="<?= $data->last_name ?>"><br>
	<label><?= _('Middle name:')?></label><input type="text" name="middle_name" value="<?= $data->middle_name ?>"><br>
	<input type="submit" name="action" value='<?= _('Modify')?>'>
	<a href="/Client/index"><?= _('Cancel')?></a>
	
</form>

<?php $this->view('shared/footer'); ?>