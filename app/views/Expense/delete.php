<?php $this->view('shared/header',_('Delete Expense Record')); ?>

<?php
	$user = $data[0];
	$expense = $data[1];
?>

<figure class="back hover-underline-animation">
<a href="/Expense/index"><img src="/images/back-arrow.png" alt="Go Back"></a>
     <figcaption><?=_('Back')?></figcaption>
</figure>
<div class="createPage">

    <div class="container">

        <h1 class="form-title"><?= _('Delete expense')?></h1>
        <h2><?= _('Are you sure you want to delete the following record?') ?></h2>

        <form method="post" action="">

            <div class="expense-full">
                <div class="info">
                    <div class ="input-box">
                        <label><?= _('Supplier Name') ?></label>
                        <input type="text" name="supplierName" id="supplierName" class="text-field" placeholder="<?= _('Supplier Name') ?>" value="<?=$expense->supplierName?>" readonly>
                    </div>
                    <div class ="input-box">
                        <label><?= _('Details') ?></label>
                        <input name="details" class="text-field" placeholder="<?= _('Details') ?>" value="<?=$expense->details?>" readonly>
                    </div>
                    <div class ="input-box">
                        <label><?= _('Amount') ?></label>
                        <input type="text" name='totalExpense' class="text-field" placeholder="<?= _('Amount') ?>"  value="<?=$expense->totalExpense?>" readonly>
                    </div>
                    <div class ="input-box">
                        <label><?= _('Select the user:') ?></label>
                        <select name='user_id' disabled>
                                <option value='<?=$expense->user_id?>'><?=$user->username?></option>
                        </select><br>
                    </div>
                </div>
            </div>
            <div class="form-submit-btn">
                <input type="submit" name="action" value='<?= _('Delete record') ?>'>
            </div>

            
        </form>

    </div>

</div>

<?php $this->view('shared/footer'); ?>