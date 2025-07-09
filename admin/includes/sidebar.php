<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Responsive Sidebar</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f4f4;
    }

    /* Sidebar Styles */
    .ts-sidebar {
      background-color: #1e1e2f;
      color: #ffffff;
      width: 240px;
      min-height: 100vh;
      padding-top: 20px;
      box-shadow: 2px 0 8px rgba(0, 0, 0, 0.2);
      position: fixed;
      top: 0;
      left: 0;
      transition: left 0.3s ease;
      z-index: 1000;
    }

    .ts-sidebar-menu {
      list-style: none;
      padding-left: 0;
      margin: 0;
    }

    .ts-sidebar-menu li {
      padding: 12px 20px;
      border-bottom: 1px solid #2f2f40;
      transition: background 0.3s ease;
    }

    .ts-sidebar-menu li:hover {
      background-color: #29293d;
    }

    .ts-sidebar-menu li a {
      color: #ffffff;
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

    /* Hamburger Button */
    .hamburger {
      display: none;
      position: fixed;
      top: 15px;
      left: 15px;
      background-color: #1e1e2f;
      color: #fff;
      padding: 10px 12px;
      border-radius: 4px;
      z-index: 1100;
      cursor: pointer;
    }

    .hamburger i {
      font-size: 18px;
    }

    /* Responsive Sidebar */
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

    /* Dummy Content */
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
<body>

  <!-- Hamburger -->
  <div class="hamburger" onclick="toggleSidebar()">
    <i class="fa fa-bars"></i>
  </div>

  <!-- Sidebar -->
  <nav class="ts-sidebar">
    <ul class="ts-sidebar-menu">
      <li class="ts-label">Main</li>
      <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#"><i class="fa fa-files-o"></i> Courses</a>
        <ul>
          <li><a href="add-courses.php">Add Courses</a></li>
          <li><a href="manage-courses.php">Manage Courses</a></li>
        </ul>
      </li>
      <li><a href="#"><i class="fa fa-desktop"></i> Rooms</a>
        <ul>
          <li><a href="create-room.php">Add a Room</a></li>
          <li><a href="manage-rooms.php">Manage Rooms</a></li>
        </ul>
      </li>
      <li><a href="registration.php"><i class="fa fa-user"></i>Student Registration</a></li>
      <li><a href="manage-students.php"><i class="fa fa-users"></i>Manage Students</a></li>
      <li><a href="#"><i class="fa fa-files-o"></i> Complaints</a>
        <ul>
          <li><a href="new-complaints.php">New</a></li>
          <li><a href="inprocess-complaints.php">In Process</a></li>
          <li><a href="closed-complaints.php">Closed</a></li>
          <li><a href="all-complaints.php">All</a></li>
        </ul>
      </li>
      <li><a href="#"><i class="fa fa-desktop"></i> Feedback</a>
        <ul>
          <li><a href="feedbacks.php">All Feedbacks</a></li>
        </ul>
      </li>
      <li><a href="access-log.php"><i class="fa fa-file"></i>User Access logs</a></li>
    </ul>
  </nav>

  <script>
    function toggleSidebar() {
      document.querySelector('.ts-sidebar').classList.toggle('active');
    }
  </script>

</body>
</html>
