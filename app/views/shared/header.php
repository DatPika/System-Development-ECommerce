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
			min-height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			background-color: lightgray;
		}
	</style>

</head>
<body>
	<header class="topheader">
		<img src="images/logo.png" alt="Favorite Design">
	</header>