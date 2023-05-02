<?php $this->view('shared/header','Log into your account'); ?>

<div class="createPage">

	<div class="container">

		<h1 class="form-title"><?= _('Login')?></h1>
			
		<form method="post" action="">

			<div class="info">
				<div class="input-box"></div>
				<div class ="input-box">
					<label><?= _('Username') ?></label><input type="text" name="username" id="username" required>
				</div>
				<div class="input-box"></div>
			</div>
			<div class="info">
				<div class="input-box"></div>
				<div class ="input-box">
					<label><?= _('Password') ?></label><input type="password" name='password' id="password" required>
				</div>
				<div class="input-box"></div>
			</div>
			<div class="form-submit-btn">
				<input type="submit" name="action" value='<?= _('Login') ?>'>
			</div>
		</form>
	</div>
</div>
<?php $this->view('shared/footer'); ?>