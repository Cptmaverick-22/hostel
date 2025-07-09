<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Responsive Sidebar</title>
  <style>
  body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #000; /* assume dark theme */
  }

  .ts-sidebar {
    background: rgba(15, 15, 20, 0.6); /* dark semi-transparent glass look */
    backdrop-filter: blur(10px);
    color: #ffffff;
    width: 240px;
    min-height: 100vh;
    padding-top: 20px;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.5);
    position: fixed;
    top: 0;
    left: 0;
    transition: left 0.3s ease;
    z-index: 1000;
    border-right: 1px solid rgba(255, 255, 255, 0.05);
  }

  .ts-sidebar-menu {
    list-style: none;
    padding-left: 0;
    margin: 0;
  }

  .ts-sidebar-menu li {
    padding: 12px 20px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    transition: background 0.3s ease;
  }

  .ts-sidebar-menu li:hover {
    background-color: rgba(255, 255, 255, 0.05);
  }

  .ts-sidebar-menu li a {
    color: #f0f0f0;
    text-decoration: none;
    display: block;
    font-size: 15px;
  }

  .ts-sidebar-menu li a i {
    margin-right: 10px;
    color: #4fc3f7;
  }

  .ts-label {
    font-size: 14px;
    font-weight: bold;
    padding: 10px 20px;
    color: #a0a0b2;
    text-transform: uppercase;
  }

  .hamburger {
    display: none;
    position: fixed;
    top: 15px;
    left: 15px;
    background-color: rgba(255, 255, 255, 0.1);
    color: #fff;
    padding: 10px 12px;
    border-radius: 4px;
    z-index: 1100;
    cursor: pointer;
    border: 1px solid rgba(255,255,255,0.2);
  }

  .hamburger i {
    font-size: 18px;
  }

  @media (max-width: 768px) {
    .ts-sidebar {
      left: -260px;
    }

    .ts-sidebar.active {
      left: 0;
    }

    .hamburger {
      display: block;
    }
  }

  .content {
    margin-left: 260px;
    padding: 20px;
  }

  @media (max-width: 768px) {
    .content {
      margin-left: 0;
      padding-top: 70px;
    }
  }
</style>

  </head>

<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label"></li>
				<?PHP if(isset($_SESSION['id']))
				{ ?>
					<li><a href="dashboard.php"><i class="fa fa-desktop"></i>Dashboard</a></li>

<li><a href="book-hostel.php"><i class="fa fa-file-o"></i>Book Hostel</a></li>
<li><a href="room-details.php"><i class="fa fa-file-o"></i>Room Details</a></li>
<li><a href="register-complaint.php"><i class="fa fa-file"></i> Complaint Registration</a></li>
<li><a href="my-complaints.php"><i class="fa fa-files-o"></i> Registered Complaints </a></li>
<li><a href="feedback.php"><i class="fa fa-file"></i> Feedback </a></li>
<li><a href="my-profile.php"><i class="fa fa-user"></i> My Profile </a></li>
<li><a href="change-password.php"><i class="fa fa-files-o"></i>Change Password</a></li>
<li><a href="access-log.php"><i class="fa fa-file-o"></i>Access log</a></li>
<?php } else { ?>
				
				<li><a href="registration.php"><i class="fa fa-files-o"></i> User Registration</a></li>
				<li><a href="index.php"><i class="fa fa-users"></i> User Login</a></li>
				<li><a href="admin"><i class="fa fa-user"></i> Admin Login</a></li>
				<?php } ?>

			</ul>
		</nav>
    <script>
    function toggleSidebar() {
      document.querySelector('.ts-sidebar').classList.toggle('active');
    }
  </script>

</html>
