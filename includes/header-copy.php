
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hostel Management System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="css/style.css">
  <style>
.brand {
  background: rgba(15, 15, 20, 0.6); /* dark semi-transparent glass look */
  color: #f1f1f1;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 15px 20px;
  position: fixed;
  width: 100%;
  z-index: 900;
  backdrop-filter: blur(8px); /* softens background behind */
  border-bottom: 1px solid rgba(255,255,255,0.1);
}

.hm {
  font-size: 24px;
  color: #ffffff;
  font-weight: bold;
  padding-left: 250px;
  font-family: 'Segoe UI', sans-serif;
  text-shadow: 1px 1px 3px rgba(0,0,0,0.7);
}

.ts-account > a {
  color: #f1f1f1;
}

.ts-account ul {
  background-color: rgba(30, 30, 40, 0.9);
  border: 1px solid rgba(255,255,255,0.1);
}

.ts-account ul li a.drop {
  color: #f1f1f1;
}

.ts-account ul li a.drop:hover {
  background-color: rgba(255,255,255,0.1);
}

.ts-account img.ts-avatar {
  border-radius: 50%;
  border: 1px solid #888;
}

.hamburger {
  background-color: rgba(255, 255, 255, 0.1);
  color: #f1f1f1;
  border: none;
}

.hamburger i {
  font-size: 18px;
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
