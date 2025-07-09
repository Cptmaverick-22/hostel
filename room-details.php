<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<title>Room Details</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

	<style>
	@media print {
		body * { visibility: hidden; }
		#print, #print * { visibility: visible; }
		#print { position: absolute; left: 0; top: 0; width: 100%; }
		.fa-print { display: none !important; }

		body { background: #fff !important; }
		table { border-collapse: collapse; width: 100%; }
		th, td { border: 1px solid black !important; padding: 8px; }
		h2, h3, h4 { margin-top: 0; }
	}
	</style>

	<script>
	function CallPrint() {
		window.print();
	}
	</script>
</head>

<body>
	<?php include('includes/header.php'); ?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php'); ?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row" id="print">
					<div class="col-md-12">

						<!-- Page title -->
						<h2 class="page-title" style="margin-top:50px;">Room Details Report</h2>
						
						<!-- Print Date -->
						<p><strong>Generated on:</strong> <?php echo date("d-m-Y"); ?></p>

						<div class="panel panel-default">
							<div class="panel-heading">All Room Details</div>
							<div class="panel-body">
								<span style="float:left">
									<i class="fa fa-print fa-2x" onclick="CallPrint()" style="cursor:pointer" title="Print"></i>
								</span>

								<table class="table table-bordered" cellspacing="0" width="100%">
									<tbody>

<?php	
$aid = $_SESSION['login'];
$ret = "SELECT * FROM registration WHERE (emailid=? OR regno=?)";
$stmt = $mysqli->prepare($ret);
$stmt->bind_param('ss', $aid, $aid);
$stmt->execute();
$res = $stmt->get_result();

while($row = $res->fetch_object()) {
?>
	<tr><td colspan="6" style="text-align:center; color:blue"><h3>Room Information</h3></td></tr>
	<tr><th>Registration Number:</th><td><?php echo $row->regno; ?></td>
		<th>Apply Date:</th><td colspan="3"><?php echo $row->postingDate; ?></td></tr>

	<tr><th>Room No:</th><td><?php echo $row->roomno; ?></td>
		<th>Seater:</th><td><?php echo $row->seater; ?></td>
		<th>Fees PM:</th><td><?php echo $fpm = $row->feespm; ?></td></tr>

	<tr><th>Food Status:</th><td><?php echo ($row->foodstatus == 1) ? 'With Food' : 'Without Food'; ?></td>
		<th>Stay From:</th><td><?php echo $row->stayfrom; ?></td>
		<th>Duration:</th><td><?php echo $dr = $row->duration; ?> Months</td></tr>

	<tr><th>Hostel Fee:</th><td><?php echo $hf = $dr * $fpm; ?></td>
		<th>Food Fee:</th>
		<td colspan="3"><?php 
			if ($row->foodstatus == 1) { 
				echo $ff = 2000 * $dr; 
			} else { 
				$ff = 0; 
				echo $ff . " (Without Food)"; 
			} 
		?></td></tr>

	<tr><th>Total Fee:</th><th colspan="5"><?php echo $hf + $ff; ?></th></tr>

	<tr><td colspan="6" style="color:red"><h4>Personal Information</h4></td></tr>

	<tr><th>Reg No:</th><td><?php echo $row->regno; ?></td>
		<th>Full Name:</th><td><?php echo $row->firstName . ' ' . $row->middleName . ' ' . $row->lastName; ?></td>
		<th>Email:</th><td><?php echo $row->emailid; ?></td></tr>

	<tr><th>Contact No:</th><td><?php echo $row->contactno; ?></td>
		<th>Gender:</th><td><?php echo $row->gender; ?></td>
		<th>Course:</th><td><?php echo $row->course; ?></td></tr>

	<tr><th>Emergency Contact:</th><td><?php echo $row->egycontactno; ?></td>
		<th>Guardian Name:</th><td><?php echo $row->guardianName; ?></td>
		<th>Guardian Relation:</th><td><?php echo $row->guardianRelation; ?></td></tr>

	<tr><th>Guardian Contact:</th><td colspan="5"><?php echo $row->guardianContactno; ?></td></tr>

	<tr><td colspan="6" style="color:blue"><h4>Addresses</h4></td></tr>

	<tr><th>Correspondence Address:</th>
		<td colspan="2"><?php echo $row->corresAddress . ", " . $row->corresCIty . ", " . $row->corresPincode . ", " . $row->corresState; ?></td>
		<th>Permanent Address:</th>
		<td colspan="2"><?php echo $row->pmntAddress . ", " . $row->pmntCity . ", " . $row->pmntPincode . ", " . $row->pmnatetState; ?></td></tr>
<?php } ?>

									</tbody>
								</table>

							</div>
						</div>

					</div> <!-- col-md-12 -->
				</div> <!-- row -->
			</div> <!-- container-fluid -->
		</div> <!-- content-wrapper -->
	</div> <!-- ts-main-content -->

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
