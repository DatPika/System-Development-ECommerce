<?php
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
$records = $mysqli->query("select * from trip");
$num_rows = $records->num_rows;
$pages = ceil($num_rows / $num_per_page);

if(isset($_GET["page"])) {
	$page=$_GET["page"] - 1;
	$start_from=$page*$num_per_page;
}
else{
	$page=1;
}

$rs_result = $mysqli->query("select * from trip order by trip_id DESC limit $start_from,$num_per_page");

?>

<?php $this->view('shared/header',_('Trip Table')); ?>

 <figure class="back hover-underline-animation">
 <a href="/Home/index"><img src="/images/back-arrow.png" alt="Go Back"></a>
	 <figcaption><?=_('Back')?></figcaption>
</figure>
<div class="createPage">
	<div class="pageHeader">
		<h2 class="title"><?=_('Trip Table')?></h2>
		<div class="headerSearch">
			<input type="text" name="searchField" placeholder="<?= _('Search') ?>">
			<input type="submit" name="searchButton" class="redButton" value="<?= _('Search') ?>">
		</div>
	</div>
	<table class="content-table">
		<thead>
			<tr>
				<th><?= _('Date') ?></th>
				<th><?= _('Address') ?></th>
				<th><?= _('Distance') ?></th>
				<th><?= _('Actions') ?></th>
			</tr>
		</thead>
	<?php
		while($rows = mysqli_fetch_assoc($rs_result)) {
	 ?>
		<tbody>
			<tr>
				<?php 
				$trip = new \app\models\Trip();
				$trip = $trip->get($rows['trip_id']);
				$project = new \app\models\Project();
				$project = $project->get($rows['project_id']);
				$client = new \app\models\Client();
				$client = $client->get($project->client_id);
				?>
				<td><?= htmlentities($project->startDate); ?></td>
				<td><?= htmlentities($client->address); ?></td>
				<td><?= htmlentities($trip->distance); ?></td>
				<td><a href='/Trip/edit/<?= $trip->trip_id ?>'><?= _('Edit') ?></a> | <a href='/Trip/delete/<?= $trip->trip_id?>'><?= _('Delete') ?></a>
			</tr>
		</tbody>
	<?php
	}
	?>

	</table>
</div>

<?php
		$sql="select * from trip";
		$total_records=mysqli_num_rows($rs_result);
		for($i=1;$i<=$pages;$i++) {
			echo "<a href='/Trip/index.php?page=".$i."'>".$i." &nbsp;</a> ";
		}
	?>

<?php $this->view('shared/footer'); ?>