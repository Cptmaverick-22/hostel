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
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>DashBoard</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<style>
		.page-title {
			color: #3c4b61; 
			font-weight: bold;
		}

		.panel-default {
			border: 1px solid #ddd; 
		}

		.panel-body {
			border-radius: 5px; 
			padding: 20px;
		}
		.stat-panel-number {
			font-size: 2em; 
			font-weight: bold;
		}
		.popup-success {
		position: fixed;
		top: 100px; /* Adjust this as needed */
		right: -300px;
		background-color: #28a745;
		color: white;
		padding: 15px 20px;
		border-radius: 5px;
		box-shadow: 0 2px 10px rgba(0,0,0,0.3);
		display: flex;
		align-items: center;
		justify-content: space-between;
		min-width: 250px;
		font-size: 16px;
		z-index: 9999;
		animation: slideIn 0.5s forwards;
		}

		/* Close icon */
		.popup-success .close-popup {
			margin-left: 15px;
			cursor: pointer;
			font-weight: bold;
			color: #fff;
		}

		/* Slide In */
		@keyframes slideIn {
			from { right: -300px; opacity: 0; }
			to { right: 20px; opacity: 1; }
		}

		/* Slide Out */
		@keyframes slideOut {
			from { right: 20px; opacity: 1; }
			to { right: -300px; opacity: 0; }
		}

	</style>

</head>

<body>
	
<?php include("includes/header.php");?>

	<div class="ts-main-content">
		<?php include("includes/sidebar.php");?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row" >
					<div class="col-md-12">

						<h2 class="page-title" style="margin-top:5%">Dashboard</h2>
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">



													<div class="stat-panel-number h1 ">My Profile</div>
													
												</div>
											</div>
											<a href="my-profile.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">

												<div class="stat-panel-number h1 ">My Room</div>
													
												</div>
											</div>
											<a href="room-details.php" class="block-anchor panel-footer text-center">See All &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
							
								</div>
							</div>
						</div>

					
						
						

					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	
	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
	<?php if (isset($_SESSION['login_success'])): ?>
    <div id="loginSuccessPopup" class="popup-success">
        <span>Login successful</span>
        <span class="close-popup" onclick="document.getElementById('loginSuccessPopup').style.display='none';">&times;</span>
    </div>

    <script>
    setTimeout(function() {
    const popup = document.getElementById('loginSuccessPopup');
    if (popup) {
        popup.style.animation = 'slideOut 0.5s forwards';
        setTimeout(() => popup.style.display = 'none', 500); // Hide after animation
    }
	}, 2000);
    </script>
    <?php unset($_SESSION['login_success']); ?>
	<?php endif; ?>

</body>

