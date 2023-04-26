<!DOCTYPE html>
<html dir="<?= _('ltr')?>" lang="<?= _('en')?>">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="../../../JavaScript/script.js"></script>
	<link rel="stylesheet" href="../../../Style/styles.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<title><?= $data ?></title>

	<style>

		.content-table {
			border-collapse: collapse;
			margin: 25px 0;
			font-size: 0.9em;
			min-width: 400px;
			border-radius: 5px 5px 0 0;
			overflow: hidden;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
		}

		.content-table thead tr {
			background-color: red;
			color: white;
			text-align: left;
			font-weight: bold;
		}

		.content-table th,
		.content-table td {
			padding: 12px 15px;
		}

		.content-table tbody tr {
			border-bottom: 1px solid #dddddd;
		}

		.createPage {
			display: flex;
			height: 100vh;
			justify-content: center;
			align-items: center;
		}

		.container{
			width: 100%;
			max-width: 650px;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
			padding: 28px;
			margin: 0 28px;
		}

		.form-title{
			font-size: 26px;
			font-weight: 600;
			text-align: center;
			padding-bottom: 6px;
			border-bottom: solid 1px grey;
		}

		.expense-info{
			display: flex;
			justify-content: space-between;
			padding: 20px 0;
		}

		


	</style>

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