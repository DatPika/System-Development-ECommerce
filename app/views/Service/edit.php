<?php $this->view('shared/header', _('Edit a service appointment')); ?>

<?php
$service = $data['service'];
$branches = $data['branches']
;$this->view('Client/detailsPartial', $service->getClient());?> 

<form method="post" action="">
	<label><?= _('Description:')?></label><textarea name="description"><?= $service->description?></textarea><br>
	<label><?= _('Appointment date and time:')?></label><input type="datetime-local" name="datetime" value="<?= \app\core\TimeHelper::DTOutBrowser($service->datetime); ?>"><br>
	<label><?= _('Select the appointment location:')?></label>
	<select name="branch_id">
		<?php 
			foreach ($branches as $branch) {
				echo "<option value='$branch->branch_id' ";
				echo (($branch->branch_id == $service->branch_id) ? 'selected' : '');
				echo ">$branch->name</option>\n";
			}
		?>
	</select><br>
	<input type="submit" name="action" value='<?= _('Edit')?>'>
	<a href="/Service/index/<?= $service->client_id?>"><?= _('Cancel')?></a>
</form>

<?php $this->view('shared/footer'); ?>