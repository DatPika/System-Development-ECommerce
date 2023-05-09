<?php $this->view('shared/header',_('Edit Expense')); ?>

<?php
    $payment = $data[1];
    $users = $data[0];
?>


<div class="createPage">

    <div class="container">

        <h1 class="form-title"><?= ('Edit Payment Information')?></h1>

        <form method="post" action="">

            <div class="expense-info">

                <div class ="input-box">
                    <label><?= _('Amount') ?></label><textarea name="amount" id="amount"><?= $payment->amount?></textarea>
                </div>
                <div class ="input-box">
                    <label><?= _('Date') ?></label><input type="text" name='date' id="date" value="<?= \app\core\TimeHelper::DTOutBrowser($payment->date)?>" required>
                </div>
                <div class ="input-box">
                    <div class="right">
                        <label><?= _('Payment Method:') ?></label>
                        <div class="input-box">
                            <label><?= _('Cash') ?></label>
                            <input type="radio" name="payment1" value="cash" <?=($payment->paymentMethod == "cash") ? "checked" : ""?>>
                        </div>
                        <div class="input-box">
                            <label><?= _('Interac') ?></label>
                            <input type="radio" name="payment1" value="interac" <?=($payment->paymentMethod == "interac") ? "checked" : ""?>>
                        </div>
                        <div class="input-box">
                            <label><?= _('E-Transfer') ?></label>
                            <input type="radio" name="payment1" value="e-transfer" <?=($payment->paymentMethod == "e-transfer") ? "checked" : ""?>>
                        </div>
                    </div>
                </div>
                <div class ="input-box">
                    <label><?= _('Select the user:') ?></label><select name='user_id'>
                    <?php
                        foreach ($users as $user) {
                            echo "<option value='$user->user_id' ";
                            echo ($user->user_id == $payment->user_id?'selected':'');
                            echo ">$user->username</option>\n";
                        }
                    ?>
                    </select><br>
                </div>
            </div>
            <div class="form-submit-btn">
                <a href="/PaymentInformation/index/<?= $payment->project_id ?>"><?= _('Cancel') ?></a>
            </div>
            <div class="form-submit-btn">
                <input type="submit" name="action" value='<?= _('Edit record') ?>'>
            </div>

        </form>

    </div>

</div>

<?php $this->view('shared/footer'); ?>