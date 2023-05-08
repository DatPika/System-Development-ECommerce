<?php $this->view('shared/header',_('Edit Expense')); ?>

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
                    <label><?= _('Supplier Name') ?></label><input type="text" name="supplierName" id="supplierName" value="<?= $expense->supplierName?>" class="supplierName" required>
                </div>
                <div class ="input-box">
                    <label><?= _('Details') ?></label><textarea name="details" id="details"><?= $expense->details?></textarea>
                </div>
                <div class ="input-box">
                    <label><?= _('Amount') ?></label><input type="text" name='totalExpense' id="totalExpense" value="<?= $expense->totalExpense?>" required>
                </div>
                <div class ="input-box">
                    <label><?= _('Select the user:') ?></label><select name='user_id'>
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
                <input type="submit" name="action" value='<?= _('Edit record') ?>'>
            </div>

            <div>
                <!-- Needs to be formatted with proper css -->
                <!-- Need to format the supplier autofill list -->
                <center>
                    <h3><?=_('Suppliers')?></h3>
              
                    <?php
                    echo "<html><body><center>\n\n";
              
                    // Open a file
                    $file = fopen("resources/supplierList.txt", "r");
                    ?>
                    <ul>
                        
                        <?php
                            // Fetching data from csv file row by row
                            while (($data = fgetcsv($file)) !== false) {
                        
                                // HTML tag for placing in row format
                                foreach ($data as $i) {
                        ?>
                                    <li>
                                        <label class="supplierAuto"><?php echo htmlspecialchars($i) . ' '; ?></label>
                                    </li>
                        <?php
                                }
                            }
                        ?>

                    </ul>
                    <?php
                    
              
                    // Closing the file
                    fclose($file);
              
                    echo "\n</center></body></html>";
                    ?>
                </center>

            </div>

        </form>

    </div>

</div>

<?php $this->view('shared/footer'); ?>