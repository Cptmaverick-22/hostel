
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hostel Management System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="css/style.css">
  <style>
    .brand {
      background-color: #1e1e2f;
      color: white;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 20px;
      position: fixed;
      width: 100%;
      z-index: 900;
    }

    .hm {
      font-size: 24px;
      color: aliceblue;
      font-weight: bold;
      padding-left:250px;
    }

    .ts-profile-nav {
      list-style: none;
      margin: 0;
      padding: 0;
      position: relative;
    }

    .ts-account {
      position: relative;
    }

    .ts-account > a {
      color: white;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 8px;
      cursor: pointer;
    }

    .ts-account img.ts-avatar {
      width: 30px;
      height: 30px;
      border-radius: 50%;
    }

    .ts-account ul {
      display: none;
      position: absolute;
      right: 0;
      background-color: #2c2c3a;
      list-style: none;
      padding: 0;
      margin: 5px 0 0 0;
      box-shadow: 0 2px 8px rgba(0,0,0,0.2);
      border-radius: 4px;
      z-index: 999;
    }

    .ts-account:hover ul {
      display: block;
    }

    .ts-account ul li {
      border-bottom: 1px solid #444;
    }

    .ts-account ul li:last-child {
      border-bottom: none;
    }

    .ts-account ul li a.drop {
      display: block;
      padding: 10px 20px;
      color: white;
      text-decoration: none;
    }

    .ts-account ul li a.drop:hover {
      background-color: #3a3a4a;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .brand {
        padding-left: 60px;
        flex-direction: column;
        align-items: flex-start;
      }

      .hm {
        font-size: 20px;
        margin-bottom: 10px;
      }

      .ts-profile-nav {
        width: 100%;
      }

      .ts-account ul {
        right: auto;
        left: 0;
      }
    }

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

    @media (max-width: 768px) {
      .hamburger {
        display: block;
      }
    }
  </style>
</head>
<body>

<!-- Hamburger for mobile -->
<div class="hamburger" onclick="toggleSidebar()">
  <i class="fa fa-bars"></i>
</div>

<!-- Top Header -->
<div class="brand">
  <span class="hm">Hostel Management System</span>

  <?php if (isset($_SESSION['login']) && !empty($_SESSION['login'])): ?>
    <ul class="ts-profile-nav">
      <li class="ts-account">
        <a href="#">
          <img src="img/ts-avatar.png" class="ts-avatar hidden-side" alt=""> Account 
          <i class="fa fa-angle-down hidden-side"></i>
        </a>
        <ul>
          <li><a href="my-profile.php" class="drop">My Account</a></li>
          <li><a href="logout.php" class="drop">Logout</a></li>
        </ul>
      </li>
    </ul>
  <?php endif; ?>
</div>

<script>
  function toggleSidebar() {
    document.querySelector('.ts-sidebar')?.classList.toggle('active');
  }
</script>
