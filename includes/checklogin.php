<?php
function check_login()
{
    if (empty($_SESSION['id'])) {	
        header("Location: logout.php");
        exit();
    }
}
?>
