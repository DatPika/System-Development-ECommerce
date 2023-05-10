<?php $this->view('shared/header',_('Delete Payment')); ?>

<?php
    $user = $data[0];
    $payment = $data[1];
?>

<figure class="back hover-underline-animation" onclick="history.back()">
     <img src="/images/back-arrow.png" alt="Go Back">
     <figcaption><?=_('Back')?></figcaption>
</figure>
<div class="createPage">

    <div class="container">

        <h1 class="form-title"><?= _('Delete Payment')?></h1>
        <h2><?= _('Are you sure you want to delete the following record?') ?></h2>
        <form method="post" action="">
            <div class="payment">
            <label><?=_('Payment Information')?>:</label>
                <div class="bottom">
                    <div class="left">
                        <div class="input-box">
                            <label><?= _('Date:') ?></label>
                            <input type="text" name="date1" class="text-field" placeholder="<?= _('DD/MM/YYYY') ?>" value="<?= $payment->date ?>">
                        </div>
                        <div class="input-box">
                            <label><?= _('Amount:') ?></label>
                            <input type="text" name="amount1" class="text-field" placeholder="<?= _('Amount') ?>" value="<?= $payment->amount ?>">
                        </div>
                        <div class="input-box">
                            <label><?= _('Select the user:') ?></label>
                            <select disabled>
                            	<option value="<?= $user->user_id ?>"><?= $user->username ?></option>
                            </select>
                        </div>
                    </div>
            			<div class="right">
                            <label><?= _('Payment Method:') ?></label>
                            <div class="input-box">
                                <label style="margin-left: 140px;"><?= _('Cash') ?></label>
                                <input style="margin-right: 140px;" type="radio" name="payment1" value="cash" <?=($payment->paymentMethod == "cash") ? "checked" : "disabled"?>>
                            </div>
                            <div class="input-box">
                                <label style="margin-left: 140px;"><?= _('Interac') ?></label>
                                <input style="margin-right: 140px;" type="radio" name="payment1" value="interac" <?=($payment->paymentMethod == "interac") ? "checked" : "disabled"?>>
                            </div>
                            <div class="input-box">
                                <label style="margin-left: 140px;"><?= _('E-Transfer') ?></label>
                                <input style="margin-right: 140px;" type="radio" name="payment1" value="e-transfer" <?=($payment->paymentMethod == "interac") ? "checked" : "disabled"?>>
                            </div>
                    </div>
                </div>
            </div>
            <div class="form-submit-btn">
                <input type="submit" name="action" value='<?= _('Delete Payment') ?>' class="redButton">
            </div>

            
        </form>

    </div>

</div>

<?php $this->view('shared/footer'); ?>