<?php $this->view('shared/header','Log into your account'); ?>

<form method="post" action="" class="content">
	<h1>Login</h1><br>
	<label>Username:</label><input type="text" name="username"><br>
	<label>Password:</label><input type="text" name="password"><br>
	<input type="submit" name="action" value='Login'>
</form>
<?php $this->view('shared/footer'); ?>