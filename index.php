<?php
session_start();
include('includes/config.php');

// Check for stale session on login page
if (isset($_SESSION['id']) && !isset($_SESSION['login_success'])) {
    unset($_SESSION['id']);
}
// Login processing
if (isset($_POST['login'])) {
    $emailreg = $_POST['emailreg'];
    $password = $_POST['password'];

    $stmt = $mysqli->prepare("SELECT email, password, id FROM userregistration WHERE email=? OR regNo=?");
    $stmt->bind_param('ss', $emailreg, $emailreg);
    $stmt->execute();
    $stmt->bind_result($email, $hashed_password, $id);
    $rs = $stmt->fetch();
    $stmt->close();

    if ($rs) {
        if (password_verify($password, $hashed_password)) {
            $_SESSION['id'] = $id;
            $_SESSION['login'] = $emailreg;
            $uip = $_SERVER['REMOTE_ADDR'];
            $ldate = date('d/m/Y h:i:s', time());
            $uid = $_SESSION['id'];
            $uemail = $_SESSION['login'];

            $ip = $_SERVER['REMOTE_ADDR'];
            $geopluginURL = 'http://www.geoplugin.net/php.gp?ip=' . $ip;
            $addrDetailsArr = @unserialize(file_get_contents($geopluginURL));
            $city = $addrDetailsArr['geoplugin_city'] ?? '';
            $country = $addrDetailsArr['geoplugin_countryName'] ?? '';

            $log = "INSERT INTO userLog(userId,userEmail,userIp,city,country) VALUES ('$uid','$uemail','$ip','$city','$country')";
            $mysqli->query($log);
            $_SESSION['login_success'] = true;
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('Invalid Username/Email or password');</script>";
        }
    } else {
        echo "<script>alert('Invalid Username/Email or password');</script>";
    }
}
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
    <title>Student Hostel Registration</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Gooey loader styles -->
    <style>
        #overlayLoader {
            position: fixed;
            left: 0; top: 0;
            width: 100vw; height: 100vh;
            background: rgba(246, 249, 255, 0.82);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 99999;
            backdrop-filter: blur(2px);
            transition: opacity 0.3s;
            opacity: 0;
        }
        #overlayLoader.visible { display: flex; opacity: 1; }

        .gooey-loader {
            display: flex;
            gap: 12px;
        }
        .gooey-loader span {
            display: block;
            width: 18px; height: 18px;
            border-radius: 50%;
            background: #011246d0;
            animation: gooey-bounce 0.8s infinite alternate;
        }
        .gooey-loader span:nth-child(2) {
            animation-delay: 0.2s;
            background: #032c57ff;
        }
        .gooey-loader span:nth-child(3) {
            animation-delay: 0.4s;
            background: #02416dff;
        }

        @keyframes gooey-bounce {
            0% { transform: translateY(0); filter: blur(0px);}
            100% { transform: translateY(-30px); filter: blur(2px);}
        }

        /* Login page styles */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-form {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .login-form input {
            margin-bottom: 20px;
        }
        .login-form h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            color: rgb(220, 234, 68);
        }
        .login-form .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
        }
        .login-form .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2e59d9;
        }
        .forgot-password {
            text-align: center;
            color: black;
        }
        .forgot-password a {
            color: #007bff;
            text-decoration: none;
        }
        .forgot-password a:hover {
            text-decoration: underline;
        }
        .user-image {
            display: block;
            margin: 0 auto 20px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }
        body {
            background-image: url("img/bg5.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }
        html, body {
            margin: 0;
            padding: 0;
            overflow-y: hidden;
            overflow-x: hidden;
            height: 100%;
        }
    </style>
</head>
<body>
    <!-- Loader: Only one! -->
    <div id="overlayLoader">
        <div class="gooey-loader">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <?php include('includes/header-copy.php'); ?>
    <div class="ts-main-content">
        <?php include('includes/sidebar-copy.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="login-container">
                    <div class="login-form">
                        <img src="img/user.png" alt="User Image" class="user-image">
                        <h2>User Login</h2>
                        <form action="" method="post" autocomplete="off">
                            <label for="emailreg" class="text-uppercase text-sm">Email / Registration Number</label>
                            <input type="text" name="emailreg" class="form-control mb" required placeholder="Email / Registration Number">

                            <label for="password" class="text-uppercase text-sm">Password</label>
                            <input type="password" name="password" class="form-control mb" required placeholder="Password">

                            <input type="submit" name="login" class="btn btn-primary btn-block" value="Login">
                        </form>
                        <div class="forgot-password">
                            <a href="forgot-password.php">Forgot password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="js/jquery-1.11.3-jquery.min.js"></script>
    <script src="js/validation.min.js"></script>
    <script>
        // Loader Show/Hide Logic
        function showLoader() {
            const overlay = document.getElementById('overlayLoader');
            overlay.style.display = "flex";
            setTimeout(() => overlay.classList.add('visible'), 10);
        }
        function hideLoader() {
            const overlay = document.getElementById('overlayLoader');
            overlay.classList.remove('visible');
            setTimeout(() => { overlay.style.display = 'none'; }, 400);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.querySelector('.login-form form');
            if (loginForm) {
                loginForm.addEventListener('submit', function() {
                    showLoader();
                });
            }
            // Hide loader after login error
            <?php if(isset($_POST['login']) && (!isset($_SESSION['id']) || !isset($_SESSION['login_success']))) { ?>
                setTimeout(hideLoader, 300);
            <?php } ?>
        });
    </script>
</body>
</html>
