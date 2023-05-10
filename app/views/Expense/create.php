<?php $this->view('shared/header',_('Add Expense')); ?>

<figure class="back hover-underline-animation" onclick="history.back()">
	 <img src="/images/back-arrow.png" alt="Go Back">
	 <figcaption><?=_('Back')?></figcaption>
</figure>
<div class="createPage">

	<div class="container">

		<h1 class="form-title"><?= _('Add expense')?></h1>
		
		<form method="post" action="">

			<div class="expense-full">
				<div class="info">
					<div class ="input-box">
						<label><?= _('Supplier Name') ?></label>
						<input type="text" name="supplierName" id="supplierName" class="text-field" placeholder="<?= _('Supplier Name') ?>" required>
					</div>
					<div class ="input-box">
						<label><?= _('Details') ?></label>
						<input name="details" class="text-field" placeholder="<?= _('Details') ?>"></input>
					</div>
					<div class ="input-box">
						<label><?= _('Amount') ?></label>
						<input type="text" name='totalExpense' class="text-field" placeholder="<?= _('Amount') ?>" required>
					</div>
					<div class ="input-box">
						<label><?= _('Select the user:') ?></label>
						<select name='user_id'>
						<?php
						foreach ($data as $user) {
							echo "<option value='$user->user_id'>$user->username</option>\n";
						}
						?>
						</select><br>
					</div>
				</div>
				<div class="suppliers">
			        <?php
			        // Open a file
			        $file = fopen("resources/supplierList.txt", "r");
			  		?>
			  		<ul>
			  			<?php
			  				// Fetching supplier from csv file row by row
			        		while (($supplier = fgetcsv($file)) !== false) {
			            		// HTML tag for placing in row format
			            		foreach ($supplier as $i) {
			            ?>
			            				<label class="supplierAuto"><?php echo htmlspecialchars($i) . ' '; ?></label>
			            <?php
			            		}
			        		}
			  			?>
			  		</ul>
			  		<?php
			        // Closing the file
			        fclose($file);
			        ?>
				</div>
				<a class="redButton" href="/Supplier/index/"><?=_('Edit Suppliers')?></a>
			</div>
			<div class="form-submit-btn">
				<input type="submit" name="action" value='<?= _('Add record') ?>'>
			</div>

			
		</form>

	</div>

</div>

<?php $this->view('shared/footer'); ?>