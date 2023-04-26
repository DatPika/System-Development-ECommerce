<?php $this->view('shared/header',('Edit Expense')); ?>

<?php
    $expense = $data['expense'];
    $users = $data['users'];
?>

<div class="createPage">

    <div class="container">

        <h1 class="form-title"><?= ('Edit expense')?></h1>

        <form method="post" action="">

            <div class="expense-info">
                <div class ="input-box">
                    <label><?= ('Supplier Name') ?></label><input type="text" name="supplierName" id="supplierName" value="<?= $expense->supplierName?>" required>
                </div>
                <div class ="input-box">
                    <label><?= ('Details') ?></label><textarea name="details" id="details"><?= $expense->details?></textarea>
                </div>
                <div class ="input-box">
                    <label><?= ('Amount') ?></label><input type="text" name='totalExpense' id="totalExpense" value="<?= $expense->totalExpense?>" required>
                </div>
                <div class ="input-box">
                    <label><?= ('Select the user:') ?></label><select name='user_id'>
                    <?php
                        foreach ($users as $user) {
                            echo "<option value='$user->user_id' ";
                            echo ($expense->user_id == $user->user_id?'selected':'');
                            echo ">$user->username</option>\n";
                        }
                    ?>
                    </select><br>
                </div>
            </div>
            <div class="form-submit-btn">
                <input type="submit" name="action" value='<?= ('Edit record') ?>'>
            </div>

        </form>

    </div>

</div>

<?php $this->view('shared/footer'); ?>