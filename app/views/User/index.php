<?php $this->view('shared/header','Log into your account'); ?>

<div class="createPage">

	<div class="container">

		<h1 class="form-title"><?= _('Login')?></h1>
			
		<form method="post" action="">

			<div class="info">
				<input type="text" name="username" id="username" placeholder=<?= _('Username') ?> required>
			</div>
			<div class="info">
			<input type="password" name='password' id="password" placeholder=<?= _('Password') ?> required>
			</div>
			<div class="form-submit-btn">
				<input type="submit" name="action" value='<?= _('Login') ?>'>
			</div>
		</form>
	</div>
</div>
<?php $this->view('shared/footer'); ?>	