<?php $this->view('shared/header','Register your account'); ?>

<form method="post" action="">
	<label>Username:</label><input type="text" name="username"><br>
	<label>Password:</label><input type="password" name="password"><br>
	<input type="submit" name="action" value='Register'>
	Already have an account? <a href="/User/index">Login.</a>
</form>

<?php $this->view('shared/footer'); ?>