<?php $this->view('shared/header',_('Edit Payment')); ?>

<?php
    $users = $data[0];
    $payment = $data[1];
    $project_id = $payment->project_id;
?>

<figure class="back hover-underline-animation">
<a href="/PaymentInformation/index/<?=$project_id?>"><img src="/images/back-arrow.png" alt="Go Back"></a>
     <figcaption><?=_('Back')?></figcaption>
</figure>
<div class="createPage">

    <div class="container">

        <h1 class="form-title"><?= _('Edit Payment')?></h1>
        <form method="post" action="">
            <div class="payment">
            <label><?=_('Payment Information')?>:</label>
                <div class="bottom">
                    <div class="left">
                        <div class="input-box">
                            <label><?= _('Date:') ?></label>
                            <input type="date" name='date' class="text-field" value="<?= $payment->date?>" required>
                        </div>
                        <div class="input-box">
                            <label><?= _('Amount:') ?></label>
                            <input type="text" name="amount" class="text-field" placeholder="<?= _('Amount') ?>" value="<?= $payment->amount ?>">
                        </div>
                        <div class="input-box">
                            <label><?= _('Select the user:') ?></label>
                            <select name="user_id">
                                <?php
                                    foreach ($users as $user) {
                                        echo "<option value='$user->user_id'";
                                        echo ($user->user_id == $_SESSION['user_id']?'selected':''); 
                                        echo ">$user->username</option>\n";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="right">
                        <label><?= _('Payment Method:') ?></label>
                        <div class="input-box">
                            <label style="margin-left: 140px;"><?= _('Cash') ?></label>
                            <input style="margin-right: 140px;" type="radio" name="payment1" value="cash" <?=($payment->paymentMethod == "cash") ? "checked" : ""?>>
                        </div>
                        <div class="input-box">
                            <label style="margin-left: 140px;"><?= _('Interac') ?></label>
                            <input style="margin-right: 140px;" type="radio" name="payment1" value="interac" <?=($payment->paymentMethod == "interac") ? "checked" : ""?>>
                        </div>
                        <div class="input-box">
                            <label style="margin-left: 140px;"><?= _('E-Transfer') ?></label>
                            <input style="margin-right: 140px;" type="radio" name="payment1" value="e-transfer" <?=($payment->paymentMethod == "e-transfer") ? "checked" : ""?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-submit-btn">
                <input type="submit" name="action" value='<?= _('Edit Payment') ?>'>
            </div>

            
        </form>

    </div>

</div>

<?php $this->view('shared/footer'); ?>