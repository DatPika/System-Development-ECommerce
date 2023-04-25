<?php $this->view('shared/header', _('Create a new client record')); ?>

<form method="post" action="">
	<label><?= _('First name:')?></label><input type="text" name="first_name"><br>
	<label><?= _('Last name:')?></label><input type="text" name="last_name"><br>
	<label><?= _('Middle name:')?></label><input type="text" name="middle_name"><br>
	<input type="submit" name="action" value='<?= _('Create')?>'>
	<a href="/Client/index"><?= _('Cancel')?></a>
	
</form>

<?php $this->view('shared/footer'); ?>