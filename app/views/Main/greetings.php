<?php $this->view('shared/header','Greetings ' . $data); ?>
	Hi <?= $data ?>!<br>
	Hi <?php echo $data; ?>!<br>
<?php $this->view('shared/footer'); ?>