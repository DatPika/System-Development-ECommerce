<?php $this->view('shared/header',_('Set up 2FA')); ?>
        <img src="/User/makeQRCode?data=<?= $data ?>">
            <?= _('Please scan the QR-code on the screen with your favorite
                                    Authenticator software, such as Google Authenticator. The
                                    authenticator software will generate codes that are valid for 30
                                    seconds only. Enter such a code while and submit it while it is
                                    still valid to confirm that the 2-factor authentication can be
                                    applied to your account.') ?>
        <form method="post" action="">
            <label><?=_('Current code:')?><input type="text" name="currentCode"></label>
            <input type="submit" name="action" value="<?= _('Verify code')?>" />
        </form>
<?php $this->view('shared/footer');?>