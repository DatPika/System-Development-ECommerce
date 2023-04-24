<?php $this->view('shared/header','User log book'); ?>
<form method="post" action="">
	<label>Write your name:</label>
	<input type="text" name="name">
	<input type="submit" name="action" value='Write my name to the log'>
</form>

<?php $this->view('shared/footer'); ?>