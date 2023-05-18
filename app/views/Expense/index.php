<?php //This is not supposed to be here but, we do not know where it could go
$env = \Dotenv\Dotenv::createImmutable(getcwd());
$env->load();
$env->required(['db_host', 'db_name', 'db_user', 'db_pass', 'db_charset'])->notEmpty();

$host = $_ENV['db_host'];
$dbname = $_ENV['db_name'];
$user = $_ENV['db_user'];
$pass = $_ENV['db_pass'];
$charset = $_ENV['db_charset'];

$mysqli = new mysqli('localhost', $user, $pass, $dbname);
if($mysqli->connect_errno != 0) {
	echo $mysqli->connect_error;
	exit();
}

$start_from = 0;
$num_per_page=10;
$records = $mysqli->query("select * from expense");
$num_rows = $records->num_rows;
$pages = ceil($num_rows / $num_per_page);

if(isset($_GET["page"])) {
	$page=$_GET["page"] - 1;
	$start_from=$page*$num_per_page;
}
else{
	$page=1;
}

$rs_result = $mysqli->query("select * from expense order by expense_id DESC limit $start_from,$num_per_page");

?>

<?php $this->view('shared/header',_('Expense Table')); ?>

<figure class="back hover-underline-animation">
<a href="/Home/index"><img src="/images/back-arrow.png" alt="Go Back"></a>
	<figcaption><?=_('Back')?></figcaption>
</figure>
<div class="createPage">
	<div class="pageHeader">
		<h2 class="title"><?=_('Expense Table')?></h2>
		<div class="headerSearch">
			<input type="text" name="searchField" placeholder="<?= _('Search') ?>">
			<input type="submit" name="searchButton" class="redButton" value="<?= _('Search') ?>">
		</div>
	</div>
	<table class="content-table">
		<thead>
			<tr>
				<th><?= _('Supplier name') ?></th>
				<th><?= _('Details') ?></th>
				<th><?= _('Expense') ?></th>
				<th><?= _('Actions') ?></th>
			</tr>
		</thead>

		<?php
			while($rows = mysqli_fetch_assoc($rs_result)) {
		?>

		<tr>
			<td><?= htmlentities($rows['supplierName']); ?></td>
			<td><?= htmlentities($rows['details']); ?></td>
			<td><?= htmlentities($rows['totalExpense']); ?></td>
			<td><a href='/Expense/Edit/<?= $rows['expense_id']?>'><?= _('Edit') ?></a> | <a href='/Expense/Delete/<?=$rows['expense_id']?>'><?= _('Delete') ?></a></td>
		</tr>		

		<?php
			}
		?>

	</table>

</div>
<div class="center">
	<?php
		$total_records=mysqli_num_rows($rs_result);
		for($i=1;$i<=$pages;$i++) {
			echo "<a class='redButton' href='/Expense/index.php?page=".$i."'>Page ".$i."</a> ";
		}
	?>
</div>

<?php $this->view('shared/footer'); ?>