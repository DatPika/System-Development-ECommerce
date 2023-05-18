<?php // This is not supposed to be here but, we do not know where it could go
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
$records = $mysqli->query("select * from project");
$num_rows = $records->num_rows;
$pages = ceil($num_rows / $num_per_page);

if(isset($_GET["page"])) {
	$page=$_GET["page"] - 1;
	$start_from=$page*$num_per_page;
}
else{
	$page=1;
}

$rs_result = $mysqli->query("select * from project order by project_id DESC limit $start_from,$num_per_page");

?>
<?php $this->view('shared/header',_('Project Table')); ?>
<figure class="back hover-underline-animation">
	 <a href="/Home/index"><img src="/images/back-arrow.png" alt="Go Back"></a>
	 <figcaption><?=_('Back')?></figcaption>
</figure>
<div class="createPage">
	<div class="pageHeader">
		<h2 class="title"><?=_('Project Table')?></h2>
	</div>
	<table class="content-table">
		<thead>
			<tr>
				<!-- Implement info for payment into the table depends on the design-->
				<th><?= _('Client Name') ?></th>
				<th><?= _('Details') ?></th>
				<th><?= _('Profit') ?></th>
				<th><?= _('Actions') ?></th>
			</tr>
		</thead>

		<?php
		while($rows = mysqli_fetch_assoc($rs_result)) {
	 	?>
			<tbody>
				<tr>
					<?php 
					$project = new \app\models\Project();
					$project = $project->get($rows['project_id']);
					$client = new \app\models\Client();
					$client = $client->get($project->client_id);
					?>
					<td><?= htmlentities($client->clientName); ?></td>
					<td>Project Cost: <?= $project->projectCost ?> / 
						<?= $project->surfaceArea ?> ft^2 / 
						<?= $project->lights ?> lights / 
						<?= $project->spots ?> spots / 
						<?= $project->vents ?> vents / 
						<?= $project->works ?> work / 
						<?= $project->otherInformation ?>
					</td>
					<td>
						<?php
							$payments = $project->getAllPayments();
							$profit = 0;
							foreach($payments as $payment) {
								$profit += $payment->amount;
							}
						?>
						<?= htmlentities($profit) ?>$
					</td>
					<td><a href='/Project/edit/<?=$project->project_id?>'><?= _('Edit') ?></a> | <a href='/Project/delete/<?=$project->project_id?>'><?= _('Delete') ?></a> | <a href='/PaymentInformation/index/<?=$project->project_id?>'><?= _('View Payments') ?></a>
				</tr>
			</tbody>
		<?php
		}
		?>

	</table>

</div>
<div class="center">
	<?php
		$total_records=mysqli_num_rows($rs_result);
		for($i=1;$i<=$pages;$i++) {
			echo "<a class='redButton' href='/Project/index.php?page=".$i."'>Page ".$i."</a> ";
		}
	?>
</div>
<?php $this->view('shared/footer'); ?>