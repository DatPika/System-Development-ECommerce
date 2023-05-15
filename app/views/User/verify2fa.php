<?php $this->view('shared/header',_('Verify 2FA')); ?>
    <form method="post" action="">
        <label><?=_('Current code:')?><input type="text" name="currentCode"></label>
        <input type="submit" name="action" value="<?=_('Verify code')?>">
    </form>
<?php $this->view('shared/footer');?>