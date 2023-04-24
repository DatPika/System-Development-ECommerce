<?php $this->view('shared/header','Log into your account'); ?>

<form method="post" action="">
	<label>Username:</label><input type="text" name="username"><br>
	<label>Password:</label><input type="text" name="password"><br>
	<input type="submit" name="action" value='Login'>
</form>

<a href='/User/register'>Register</a>
<?php $this->view('shared/footer'); ?>
