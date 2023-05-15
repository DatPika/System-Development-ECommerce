<?php $this->view('shared/header',_('Delete Payment')); ?>

<?php
    $user = $data[0];
    $payment = $data[1];
    $project_id = $data[1]->project_id;
?>

<figure class="back hover-underline-animation">
<a href="/PaymentInformation/index/<?=$project_id?>"><img src="/images/back-arrow.png" alt="Go Back"></a>
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
                            <input name="date" class="text-field" value="<?=$payment->date?>"id="date" readonly>
                        </div>
                        <div class="input-box">
                            <label><?= _('Amount:') ?></label>
                            <input type="text" name="amount" class="text-field" placeholder="<?= _('Amount') ?>" value="<?= $payment->amount ?>" readonly>
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
                                <input style="margin-right: 140px;" type="radio" name="payment1" value="e-transfer" <?=($payment->paymentMethod == "e-transfer") ? "checked" : "disabled"?>>
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