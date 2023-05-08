<?php $this->view('shared/header',_('Log into your account')); ?>

<div class="createPage">

	<div class="container">

		<h1 class="form-title"><?= _('Login')?></h1>
			
		<form method="post" action="">

			<div class="login-info">
				<input type="text" name="username" class="text-field" placeholder="<?= _('Username') ?>" required>
			</div>
			<div class="login-info">
			<input type="password" name='password' class="text-field" placeholder="<?= _('Password') ?>" required>
			</div>
			<div class="form-submit-btn">
				<input type="submit" name="action" value='<?= _('Login') ?>'>
			</div>
		</form>
	</div>
	<a href='?lang=fr_CA'>Français (Canada)</a>
	<a href='?lang=en'>English</a>
</div>
<?php $this->view('shared/footer'); ?>	