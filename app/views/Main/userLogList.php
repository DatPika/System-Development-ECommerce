<?php $this->view('shared/header','User log book'); ?>

<table>
	<tr><th>Log entry</th><th>actions</th></tr>
<?php

foreach ($data as $key=>$logEntry) { ?>
	<tr><td><?= htmlentities($logEntry) ?></td><td><a href='/Main/logDelete/<?=$key?>'>delete</a></td></tr>
<?php

}
?>
</table>
<?php $this->view('shared/footer'); ?>