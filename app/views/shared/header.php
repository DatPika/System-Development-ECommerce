<!DOCTYPE html>
<html dir="<?= _('ltr')?>" lang="<?= _('en')?>">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="../../../JavaScript/script.js"></script>
	<link rel="stylesheet" href="../../../Style/styles.css">
	<title><?= $data ?></title>
</head>
<body>
<?php
if(isset($_GET['success'])){
	echo '<div class="alert alert-success">'.$_GET['success'].'</div>';
}
if(isset($_GET['error'])){
	echo '<div class="alert alert-danger">'.$_GET['error'].'</div>';
}
?>